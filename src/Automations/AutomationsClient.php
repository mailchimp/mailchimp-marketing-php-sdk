<?php

namespace Mailchimp\Automations;

use Psr\Http\Client\ClientInterface;
use Mailchimp\Core\Client\RawClient;
use Mailchimp\Automations\Requests\ListAutomationsRequest;
use Mailchimp\Core\Pagination\Pager;
use Mailchimp\Types\AutomationWorkflow;
use Mailchimp\Core\Pagination\OffsetPager;
use Mailchimp\Automations\Types\ListAutomationsResponse;
use Mailchimp\Automations\Requests\CreateAutomationsRequest;
use Mailchimp\Exceptions\MailchimpException;
use Mailchimp\Exceptions\MailchimpApiException;
use Mailchimp\Core\Json\JsonApiRequest;
use Mailchimp\Environments;
use Mailchimp\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Mailchimp\Automations\Requests\GetAutomationsRequest;
use Mailchimp\Automations\Types\ListEmailsAutomationsResponse;
use Mailchimp\Types\AutomationWorkflowEmail;
use Mailchimp\Automations\Requests\UpdateEmailAutomationsRequest;
use Mailchimp\Automations\Types\ListEmailQueueAutomationsResponse;
use Mailchimp\Automations\Requests\CreateEmailQueueAutomationsRequest;
use Mailchimp\Types\SubscriberInAutomationQueue;
use Mailchimp\Automations\Types\ListRemovedSubscribersAutomationsResponse;
use Mailchimp\Automations\Requests\CreateRemovedSubscriberAutomationsRequest;
use Mailchimp\Types\SubscriberRemovedFromAutomationWorkflow;
use Mailchimp\Core\Json\JsonSerializer;

class AutomationsClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * Get a summary of an account's classic automations.
     *
     * Example:
     * ```php
     * $client->automations->list(
     *     new ListAutomationsRequest([]),
     * );
     * ```
     *
     * @param ListAutomationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<AutomationWorkflow>
     */
    public function list(ListAutomationsRequest $request = new ListAutomationsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListAutomationsRequest $request) => $this->_list($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListAutomationsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListAutomationsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListAutomationsResponse $response) => $response?->automations ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Create a new classic automation in your Mailchimp account.
     *
     * Example:
     * ```php
     * $client->automations->create(
     *     new CreateAutomationsRequest([
     *         'recipients' => new CreateAutomationsRequestRecipients([]),
     *         'triggerSettings' => new CreateAutomationsRequestTriggerSettings([
     *             'workflowType' => CreateAutomationsRequestTriggerSettingsWorkflowType::AbandonedBrowse->value,
     *         ]),
     *     ]),
     * );
     * ```
     *
     * @param CreateAutomationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AutomationWorkflow
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function create(CreateAutomationsRequest $request, ?array $options = null): ?AutomationWorkflow
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return AutomationWorkflow::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a summary of an individual classic automation workflow's settings and content. The `trigger_settings` object returns information for the first email in the workflow.
     *
     * Example:
     * ```php
     * $client->automations->get(
     *     'workflow_id',
     *     new GetAutomationsRequest([]),
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param GetAutomationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AutomationWorkflow
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function get(string $workflowId, GetAutomationsRequest $request = new GetAutomationsRequest(), ?array $options = null): ?AutomationWorkflow
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return AutomationWorkflow::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Archiving will permanently end your automation and keep the report data. You’ll be able to replicate your archived automation, but you can’t restart it.
     *
     * Example:
     * ```php
     * $client->automations->createActionArchive(
     *     'workflow_id',
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createActionArchive(string $workflowId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/actions/archive",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Pause all emails in a specific classic automation workflow.
     *
     * Example:
     * ```php
     * $client->automations->createActionPauseAllEmail(
     *     'workflow_id',
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createActionPauseAllEmail(string $workflowId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/actions/pause-all-emails",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Start all emails in a classic automation workflow.
     *
     * Example:
     * ```php
     * $client->automations->createActionStartAllEmail(
     *     'workflow_id',
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createActionStartAllEmail(string $workflowId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/actions/start-all-emails",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a summary of the emails in a classic automation workflow.
     *
     * Example:
     * ```php
     * $client->automations->listEmails(
     *     'workflow_id',
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListEmailsAutomationsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listEmails(string $workflowId, ?array $options = null): ?ListEmailsAutomationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/emails",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListEmailsAutomationsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get information about an individual classic automation workflow email.
     *
     * Example:
     * ```php
     * $client->automations->getEmail(
     *     'workflow_id',
     *     'workflow_email_id',
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param string $workflowEmailId The unique id for the Automation workflow email.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AutomationWorkflowEmail
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getEmail(string $workflowId, string $workflowEmailId, ?array $options = null): ?AutomationWorkflowEmail
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/emails/{$workflowEmailId}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return AutomationWorkflowEmail::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Removes an individual classic automation workflow email. Emails from certain workflow types, including the Abandoned Cart Email (abandonedCart) and Product Retargeting Email (abandonedBrowse) Workflows, cannot be deleted.
     *
     * Example:
     * ```php
     * $client->automations->deleteEmail(
     *     'workflow_id',
     *     'workflow_email_id',
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param string $workflowEmailId The unique id for the Automation workflow email.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function deleteEmail(string $workflowId, string $workflowEmailId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/emails/{$workflowEmailId}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Update settings for a classic automation workflow email.  Only works with workflows of type: abandonedBrowse, abandonedCart, emailFollowup, or singleWelcome.
     *
     * Example:
     * ```php
     * $client->automations->updateEmail(
     *     'workflow_id',
     *     'workflow_email_id',
     *     new UpdateEmailAutomationsRequest([]),
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param string $workflowEmailId The unique id for the Automation workflow email.
     * @param UpdateEmailAutomationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AutomationWorkflowEmail
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateEmail(string $workflowId, string $workflowEmailId, UpdateEmailAutomationsRequest $request = new UpdateEmailAutomationsRequest(), ?array $options = null): ?AutomationWorkflowEmail
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/emails/{$workflowEmailId}",
                    method: HttpMethod::PATCH,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return AutomationWorkflowEmail::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Pause an automated email.
     *
     * Example:
     * ```php
     * $client->automations->createEmailActionPause(
     *     'workflow_id',
     *     'workflow_email_id',
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param string $workflowEmailId The unique id for the Automation workflow email.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createEmailActionPause(string $workflowId, string $workflowEmailId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/emails/{$workflowEmailId}/actions/pause",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Start an automated email.
     *
     * Example:
     * ```php
     * $client->automations->createEmailActionStart(
     *     'workflow_id',
     *     'workflow_email_id',
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param string $workflowEmailId The unique id for the Automation workflow email.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createEmailActionStart(string $workflowId, string $workflowEmailId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/emails/{$workflowEmailId}/actions/start",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get information about a classic automation email queue.
     *
     * Example:
     * ```php
     * $client->automations->listEmailQueue(
     *     'workflow_id',
     *     'workflow_email_id',
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param string $workflowEmailId The unique id for the Automation workflow email.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListEmailQueueAutomationsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listEmailQueue(string $workflowId, string $workflowEmailId, ?array $options = null): ?ListEmailQueueAutomationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/emails/{$workflowEmailId}/queue",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListEmailQueueAutomationsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Manually add a subscriber to a workflow, bypassing the default trigger settings. You can also use this endpoint to trigger a series of automated emails in an API 3.0 workflow type.
     *
     * Example:
     * ```php
     * $client->automations->createEmailQueue(
     *     'workflow_id',
     *     'workflow_email_id',
     *     new CreateEmailQueueAutomationsRequest([
     *         'emailAddress' => 'email_address',
     *     ]),
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param string $workflowEmailId The unique id for the Automation workflow email.
     * @param CreateEmailQueueAutomationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SubscriberInAutomationQueue
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createEmailQueue(string $workflowId, string $workflowEmailId, CreateEmailQueueAutomationsRequest $request, ?array $options = null): ?SubscriberInAutomationQueue
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/emails/{$workflowEmailId}/queue",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return SubscriberInAutomationQueue::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get information about a specific subscriber in a classic automation email queue.
     *
     * Example:
     * ```php
     * $client->automations->getEmailQueue(
     *     'workflow_id',
     *     'workflow_email_id',
     *     'subscriber_hash',
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param string $workflowEmailId The unique id for the Automation workflow email.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SubscriberInAutomationQueue
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getEmailQueue(string $workflowId, string $workflowEmailId, string $subscriberHash, ?array $options = null): ?SubscriberInAutomationQueue
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/emails/{$workflowEmailId}/queue/{$subscriberHash}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return SubscriberInAutomationQueue::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get information about subscribers who were removed from a classic automation workflow.
     *
     * Example:
     * ```php
     * $client->automations->listRemovedSubscribers(
     *     'workflow_id',
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListRemovedSubscribersAutomationsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listRemovedSubscribers(string $workflowId, ?array $options = null): ?ListRemovedSubscribersAutomationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/removed-subscribers",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListRemovedSubscribersAutomationsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Remove a subscriber from a specific classic automation workflow. You can remove a subscriber at any point in an automation workflow, regardless of how many emails they've been sent from that workflow. Once they're removed, they can never be added back to the same workflow.
     *
     * Example:
     * ```php
     * $client->automations->createRemovedSubscriber(
     *     'workflow_id',
     *     new CreateRemovedSubscriberAutomationsRequest([
     *         'emailAddress' => 'email_address',
     *     ]),
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param CreateRemovedSubscriberAutomationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SubscriberRemovedFromAutomationWorkflow
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createRemovedSubscriber(string $workflowId, CreateRemovedSubscriberAutomationsRequest $request, ?array $options = null): ?SubscriberRemovedFromAutomationWorkflow
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/removed-subscribers",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return SubscriberRemovedFromAutomationWorkflow::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get information about a specific subscriber who was removed from a classic automation workflow.
     *
     * Example:
     * ```php
     * $client->automations->getRemovedSubscriber(
     *     'workflow_id',
     *     'subscriber_hash',
     * );
     * ```
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SubscriberRemovedFromAutomationWorkflow
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getRemovedSubscriber(string $workflowId, string $subscriberHash, ?array $options = null): ?SubscriberRemovedFromAutomationWorkflow
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations/{$workflowId}/removed-subscribers/{$subscriberHash}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return SubscriberRemovedFromAutomationWorkflow::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a summary of an account's classic automations.
     *
     * @param ListAutomationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListAutomationsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _list(ListAutomationsRequest $request = new ListAutomationsRequest(), ?array $options = null): ?ListAutomationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->count != null) {
            $query['count'] = $request->count;
        }
        if ($request->offset != null) {
            $query['offset'] = $request->offset;
        }
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->beforeCreateTime != null) {
            $query['before_create_time'] = JsonSerializer::serializeDateTime($request->beforeCreateTime);
        }
        if ($request->sinceCreateTime != null) {
            $query['since_create_time'] = JsonSerializer::serializeDateTime($request->sinceCreateTime);
        }
        if ($request->beforeStartTime != null) {
            $query['before_start_time'] = JsonSerializer::serializeDateTime($request->beforeStartTime);
        }
        if ($request->sinceStartTime != null) {
            $query['since_start_time'] = JsonSerializer::serializeDateTime($request->sinceStartTime);
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/automations",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListAutomationsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
