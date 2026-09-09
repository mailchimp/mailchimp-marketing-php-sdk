<?php

namespace Mailchimp\Campaigns;

use Psr\Http\Client\ClientInterface;
use Mailchimp\Core\Client\RawClient;
use Mailchimp\Campaigns\Requests\ListCampaignsRequest;
use Mailchimp\Core\Pagination\Pager;
use Mailchimp\Types\Campaigns;
use Mailchimp\Core\Pagination\OffsetPager;
use Mailchimp\Campaigns\Types\ListCampaignsResponse;
use Mailchimp\Campaigns\Requests\CreateCampaignsRequest;
use Mailchimp\Types\Campaign;
use Mailchimp\Exceptions\MailchimpException;
use Mailchimp\Exceptions\MailchimpApiException;
use Mailchimp\Core\Json\JsonApiRequest;
use Mailchimp\Environments;
use Mailchimp\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Mailchimp\Campaigns\Requests\GetCampaignsRequest;
use Mailchimp\Campaigns\Requests\UpdateCampaignsRequest;
use Mailchimp\Campaigns\Requests\CreateActionCreateResendCampaignsRequest;
use Mailchimp\Campaigns\Requests\CreateActionScheduleCampaignsRequest;
use Mailchimp\Campaigns\Requests\CreateActionTestCampaignsRequest;
use Mailchimp\Campaigns\Requests\GetContentCampaignsRequest;
use Mailchimp\Types\CampaignContent;
use Mailchimp\Campaigns\Requests\UpsertContentCampaignsRequest;
use Mailchimp\Campaigns\Requests\ListFeedbackCampaignsRequest;
use Mailchimp\Campaigns\Types\ListFeedbackCampaignsResponse;
use Mailchimp\Campaigns\Requests\CreateFeedbackCampaignsRequest;
use Mailchimp\Campaigns\Types\CreateFeedbackCampaignsResponse;
use Mailchimp\Campaigns\Requests\GetFeedbackCampaignsRequest;
use Mailchimp\Types\CampaignFeedback;
use Mailchimp\Campaigns\Requests\UpdateFeedbackCampaignsRequest;
use Mailchimp\Campaigns\Requests\ListSendChecklistCampaignsRequest;
use Mailchimp\Campaigns\Types\ListSendChecklistCampaignsResponse;
use Mailchimp\Core\Json\JsonSerializer;

class CampaignsClient
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
     * Get all campaigns in an account.
     *
     * Example:
     * ```php
     * $client->campaigns->list(
     *     new ListCampaignsRequest([]),
     * );
     * ```
     *
     * @param ListCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<Campaigns>
     */
    public function list(ListCampaignsRequest $request = new ListCampaignsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListCampaignsRequest $request) => $this->_list($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListCampaignsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListCampaignsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListCampaignsResponse $response) => $response?->campaigns ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Create a new Mailchimp campaign.
     *
     * Example:
     * ```php
     * $client->campaigns->create(
     *     new CreateCampaignsRequest([
     *         'type' => CreateCampaignsRequestType::Regular->value,
     *     ]),
     * );
     * ```
     *
     * @param CreateCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Campaign
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function create(CreateCampaignsRequest $request, ?array $options = null): ?Campaign
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns",
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
                return Campaign::fromJson($json);
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
     * Get information about a specific campaign.
     *
     * Example:
     * ```php
     * $client->campaigns->get(
     *     'campaign_id',
     *     new GetCampaignsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param GetCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Campaign
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function get(string $campaignId, GetCampaignsRequest $request = new GetCampaignsRequest(), ?array $options = null): ?Campaign
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->includeResendShortcutEligibility != null) {
            $query['include_resend_shortcut_eligibility'] = $request->includeResendShortcutEligibility;
        }
        if ($request->includeResendShortcutUsage != null) {
            $query['include_resend_shortcut_usage'] = $request->includeResendShortcutUsage;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}",
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
                return Campaign::fromJson($json);
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
     * Remove a campaign from your Mailchimp account.
     *
     * Example:
     * ```php
     * $client->campaigns->delete(
     *     'campaign_id',
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
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
    public function delete(string $campaignId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}",
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
     * Update some or all of the settings for a specific campaign.
     *
     * Example:
     * ```php
     * $client->campaigns->update(
     *     'campaign_id',
     *     new UpdateCampaignsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param UpdateCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Campaign
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function update(string $campaignId, UpdateCampaignsRequest $request = new UpdateCampaignsRequest(), ?array $options = null): ?Campaign
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}",
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
                return Campaign::fromJson($json);
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
     * Cancel a Regular or Plain-Text Campaign after you send, before all of your recipients receive it. This feature is included with Mailchimp Pro.
     *
     * Example:
     * ```php
     * $client->campaigns->createActionCancelSend(
     *     'campaign_id',
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
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
    public function createActionCancelSend(string $campaignId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}/actions/cancel-send",
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
     * Remove the guesswork for resending a campaign to certain segments. You can use this endpoint as a shortcut to replicate a campaign and resend it to common segments, such as those who didn't open the campaign, or any new subscribers since it was sent.
     *
     * Example:
     * ```php
     * $client->campaigns->createActionCreateResend(
     *     'campaign_id',
     *     new CreateActionCreateResendCampaignsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param CreateActionCreateResendCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Campaign
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createActionCreateResend(string $campaignId, CreateActionCreateResendCampaignsRequest $request = new CreateActionCreateResendCampaignsRequest(), ?array $options = null): ?Campaign
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}/actions/create-resend",
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
                return Campaign::fromJson($json);
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
     * Pause an RSS-Driven campaign.
     *
     * Example:
     * ```php
     * $client->campaigns->createActionPause(
     *     'campaign_id',
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
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
    public function createActionPause(string $campaignId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}/actions/pause",
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
     * Replicate a campaign in saved or send status.
     *
     * Example:
     * ```php
     * $client->campaigns->createActionReplicate(
     *     'campaign_id',
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Campaign
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createActionReplicate(string $campaignId, ?array $options = null): ?Campaign
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}/actions/replicate",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return Campaign::fromJson($json);
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
     * Resume an RSS-Driven campaign.
     *
     * Example:
     * ```php
     * $client->campaigns->createActionResume(
     *     'campaign_id',
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
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
    public function createActionResume(string $campaignId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}/actions/resume",
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
     * Schedule a campaign for delivery. If you're using Multivariate Campaigns to test send times or sending RSS Campaigns, use the send action instead.
     *
     * Example:
     * ```php
     * $client->campaigns->createActionSchedule(
     *     'campaign_id',
     *     new CreateActionScheduleCampaignsRequest([
     *         'scheduleTime' => new DateTime('2024-01-15T09:30:00Z'),
     *     ]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param CreateActionScheduleCampaignsRequest $request
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
    public function createActionSchedule(string $campaignId, CreateActionScheduleCampaignsRequest $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}/actions/schedule",
                    method: HttpMethod::POST,
                    body: $request,
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
     * Send a Mailchimp campaign. For RSS Campaigns, the campaign will send according to its schedule. All other campaigns will send immediately.
     *
     * Example:
     * ```php
     * $client->campaigns->createActionSend(
     *     'campaign_id',
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
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
    public function createActionSend(string $campaignId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}/actions/send",
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
     * Send a test email.
     *
     * Example:
     * ```php
     * $client->campaigns->createActionTest(
     *     'campaign_id',
     *     new CreateActionTestCampaignsRequest([
     *         'sendType' => CreateActionTestCampaignsRequestSendType::Html->value,
     *         'testEmails' => [
     *             'test_emails',
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param CreateActionTestCampaignsRequest $request
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
    public function createActionTest(string $campaignId, CreateActionTestCampaignsRequest $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}/actions/test",
                    method: HttpMethod::POST,
                    body: $request,
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
     * Unschedule a scheduled campaign that hasn't started sending.
     *
     * Example:
     * ```php
     * $client->campaigns->createActionUnschedule(
     *     'campaign_id',
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
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
    public function createActionUnschedule(string $campaignId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}/actions/unschedule",
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
     * Get the the HTML and plain-text content for a campaign.
     *
     * Example:
     * ```php
     * $client->campaigns->getContent(
     *     'campaign_id',
     *     new GetContentCampaignsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param GetContentCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CampaignContent
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getContent(string $campaignId, GetContentCampaignsRequest $request = new GetContentCampaignsRequest(), ?array $options = null): ?CampaignContent
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
                    path: "3.0/campaigns/{$campaignId}/content",
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
                return CampaignContent::fromJson($json);
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
     * Set the content for a campaign.
     *
     * Example:
     * ```php
     * $client->campaigns->upsertContent(
     *     'campaign_id',
     *     new UpsertContentCampaignsRequest([
     *         'body' => new CampaignContent([]),
     *     ]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param UpsertContentCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CampaignContent
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function upsertContent(string $campaignId, UpsertContentCampaignsRequest $request, ?array $options = null): ?CampaignContent
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}/content",
                    method: HttpMethod::PUT,
                    body: $request->body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return CampaignContent::fromJson($json);
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
     * Get team feedback while you're working together on a Mailchimp campaign.
     *
     * Example:
     * ```php
     * $client->campaigns->listFeedback(
     *     'campaign_id',
     *     new ListFeedbackCampaignsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListFeedbackCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListFeedbackCampaignsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listFeedback(string $campaignId, ListFeedbackCampaignsRequest $request = new ListFeedbackCampaignsRequest(), ?array $options = null): ?ListFeedbackCampaignsResponse
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
                    path: "3.0/campaigns/{$campaignId}/feedback",
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
                return ListFeedbackCampaignsResponse::fromJson($json);
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
     * Add feedback on a specific campaign.
     *
     * Example:
     * ```php
     * $client->campaigns->createFeedback(
     *     'campaign_id',
     *     new CreateFeedbackCampaignsRequest([
     *         'message' => 'message',
     *     ]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param CreateFeedbackCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateFeedbackCampaignsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createFeedback(string $campaignId, CreateFeedbackCampaignsRequest $request, ?array $options = null): ?CreateFeedbackCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}/feedback",
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
                return CreateFeedbackCampaignsResponse::fromJson($json);
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
     * Get a specific feedback message from a campaign.
     *
     * Example:
     * ```php
     * $client->campaigns->getFeedback(
     *     'campaign_id',
     *     'feedback_id',
     *     new GetFeedbackCampaignsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param string $feedbackId The unique id for the feedback message.
     * @param GetFeedbackCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CampaignFeedback
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getFeedback(string $campaignId, string $feedbackId, GetFeedbackCampaignsRequest $request = new GetFeedbackCampaignsRequest(), ?array $options = null): ?CampaignFeedback
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
                    path: "3.0/campaigns/{$campaignId}/feedback/{$feedbackId}",
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
                return CampaignFeedback::fromJson($json);
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
     * Remove a specific feedback message for a campaign.
     *
     * Example:
     * ```php
     * $client->campaigns->deleteFeedback(
     *     'campaign_id',
     *     'feedback_id',
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param string $feedbackId The unique id for the feedback message.
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
    public function deleteFeedback(string $campaignId, string $feedbackId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}/feedback/{$feedbackId}",
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
     * Update a specific feedback message for a campaign.
     *
     * Example:
     * ```php
     * $client->campaigns->updateFeedback(
     *     'campaign_id',
     *     'feedback_id',
     *     new UpdateFeedbackCampaignsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param string $feedbackId The unique id for the feedback message.
     * @param UpdateFeedbackCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CampaignFeedback
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateFeedback(string $campaignId, string $feedbackId, UpdateFeedbackCampaignsRequest $request = new UpdateFeedbackCampaignsRequest(), ?array $options = null): ?CampaignFeedback
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns/{$campaignId}/feedback/{$feedbackId}",
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
                return CampaignFeedback::fromJson($json);
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
     * Review the send checklist for a campaign, and resolve any issues before sending.
     *
     * Example:
     * ```php
     * $client->campaigns->listSendChecklist(
     *     'campaign_id',
     *     new ListSendChecklistCampaignsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListSendChecklistCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSendChecklistCampaignsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listSendChecklist(string $campaignId, ListSendChecklistCampaignsRequest $request = new ListSendChecklistCampaignsRequest(), ?array $options = null): ?ListSendChecklistCampaignsResponse
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
                    path: "3.0/campaigns/{$campaignId}/send-checklist",
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
                return ListSendChecklistCampaignsResponse::fromJson($json);
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
     * Get all campaigns in an account.
     *
     * @param ListCampaignsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListCampaignsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _list(ListCampaignsRequest $request = new ListCampaignsRequest(), ?array $options = null): ?ListCampaignsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->count != null) {
            $query['count'] = $request->count;
        }
        if ($request->offset != null) {
            $query['offset'] = $request->offset;
        }
        if ($request->type != null) {
            $query['type'] = $request->type;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->beforeSendTime != null) {
            $query['before_send_time'] = JsonSerializer::serializeDateTime($request->beforeSendTime);
        }
        if ($request->sinceSendTime != null) {
            $query['since_send_time'] = JsonSerializer::serializeDateTime($request->sinceSendTime);
        }
        if ($request->beforeCreateTime != null) {
            $query['before_create_time'] = JsonSerializer::serializeDateTime($request->beforeCreateTime);
        }
        if ($request->sinceCreateTime != null) {
            $query['since_create_time'] = JsonSerializer::serializeDateTime($request->sinceCreateTime);
        }
        if ($request->listId != null) {
            $query['list_id'] = $request->listId;
        }
        if ($request->folderId != null) {
            $query['folder_id'] = $request->folderId;
        }
        if ($request->memberId != null) {
            $query['member_id'] = $request->memberId;
        }
        if ($request->sortField != null) {
            $query['sort_field'] = $request->sortField;
        }
        if ($request->sortDir != null) {
            $query['sort_dir'] = $request->sortDir;
        }
        if ($request->includeResendShortcutEligibility != null) {
            $query['include_resend_shortcut_eligibility'] = $request->includeResendShortcutEligibility;
        }
        if ($request->includeResendShortcutUsage != null) {
            $query['include_resend_shortcut_usage'] = $request->includeResendShortcutUsage;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/campaigns",
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
                return ListCampaignsResponse::fromJson($json);
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
