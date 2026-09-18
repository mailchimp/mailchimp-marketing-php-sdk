<?php

namespace Mailchimp\Audiences;

use Psr\Http\Client\ClientInterface;
use Mailchimp\Core\Client\RawClient;
use Mailchimp\Audiences\Requests\GetAudienceContactListRequest;
use Mailchimp\Audiences\Types\GetAudienceContactListResponse;
use Mailchimp\Exceptions\MailchimpException;
use Mailchimp\Exceptions\MailchimpApiException;
use Mailchimp\Core\Json\JsonSerializer;
use Mailchimp\Core\Json\JsonApiRequest;
use Mailchimp\Environments;
use Mailchimp\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Mailchimp\Audiences\Requests\CreateAudienceContactRequest;
use Mailchimp\Types\AudiencesContact;
use Mailchimp\Audiences\Requests\GetAudienceContactRequest;
use Mailchimp\Audiences\Requests\PatchAudienceContactRequest;

class AudiencesClient
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
     * Get a list of omni-channel contacts for a given audience.
     *
     * Example:
     * ```php
     * $client->audiences->getAudienceContactList(
     *     'audience_id',
     *     new GetAudienceContactListRequest([]),
     * );
     * ```
     *
     * @param string $audienceId The unique ID for the audience.
     * @param GetAudienceContactListRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetAudienceContactListResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getAudienceContactList(string $audienceId, GetAudienceContactListRequest $request = new GetAudienceContactListRequest(), ?array $options = null): ?GetAudienceContactListResponse
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
        if ($request->cursor != null) {
            $query['cursor'] = $request->cursor;
        }
        if ($request->createdBefore != null) {
            $query['created_before'] = JsonSerializer::serializeDateTime($request->createdBefore);
        }
        if ($request->createdSince != null) {
            $query['created_since'] = JsonSerializer::serializeDateTime($request->createdSince);
        }
        if ($request->updatedBefore != null) {
            $query['updated_before'] = JsonSerializer::serializeDateTime($request->updatedBefore);
        }
        if ($request->updatedSince != null) {
            $query['updated_since'] = JsonSerializer::serializeDateTime($request->updatedSince);
        }
        if ($request->sortField != null) {
            $query['sort_field'] = $request->sortField;
        }
        if ($request->sortDir != null) {
            $query['sort_dir'] = $request->sortDir;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/audiences/{$audienceId}/contacts",
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
                return GetAudienceContactListResponse::fromJson($json);
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
     * Create a new omni-channel contact for an audience.
     *
     * Example:
     * ```php
     * $client->audiences->createAudienceContact(
     *     'audience_id',
     *     new CreateAudienceContactRequest([]),
     * );
     * ```
     *
     * @param string $audienceId The unique ID for the audience.
     * @param CreateAudienceContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AudiencesContact
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createAudienceContact(string $audienceId, CreateAudienceContactRequest $request = new CreateAudienceContactRequest(), ?array $options = null): ?AudiencesContact
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->mergeFieldValidationMode != null) {
            $query['merge_field_validation_mode'] = $request->mergeFieldValidationMode;
        }
        if ($request->dataMode != null) {
            $query['data_mode'] = $request->dataMode;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/audiences/{$audienceId}/contacts",
                    method: HttpMethod::POST,
                    query: $query,
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
                return AudiencesContact::fromJson($json);
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
     * Retrieve a specific omni-channel contact in an audience.
     *
     * Example:
     * ```php
     * $client->audiences->getAudienceContact(
     *     'audience_id',
     *     'contact_id',
     *     new GetAudienceContactRequest([]),
     * );
     * ```
     *
     * @param string $audienceId The unique ID for the audience.
     * @param string $contactId A unique identifier for the contact, which can be a Mailchimp contact ID or a channel hash. A channel hash must follow the format email:[md5_hash] (where the hash is the MD5 of the lowercased email address) or sms:[sha256_hash] (where the hash is the SHA256 of the E.164-formatted phone number).
     * @param GetAudienceContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AudiencesContact
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getAudienceContact(string $audienceId, string $contactId, GetAudienceContactRequest $request = new GetAudienceContactRequest(), ?array $options = null): ?AudiencesContact
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
                    path: "3.0/audiences/{$audienceId}/contacts/{$contactId}",
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
                return AudiencesContact::fromJson($json);
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
     * Update an existing omni-channel contact.
     *
     * Example:
     * ```php
     * $client->audiences->patchAudienceContact(
     *     'audience_id',
     *     'contact_id',
     *     new PatchAudienceContactRequest([]),
     * );
     * ```
     *
     * @param string $audienceId The unique ID for the audience.
     * @param string $contactId The unique id for the contact.
     * @param PatchAudienceContactRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AudiencesContact
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function patchAudienceContact(string $audienceId, string $contactId, PatchAudienceContactRequest $request = new PatchAudienceContactRequest(), ?array $options = null): ?AudiencesContact
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->mergeFieldValidationMode != null) {
            $query['merge_field_validation_mode'] = $request->mergeFieldValidationMode;
        }
        if ($request->dataMode != null) {
            $query['data_mode'] = $request->dataMode;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/audiences/{$audienceId}/contacts/{$contactId}",
                    method: HttpMethod::PATCH,
                    query: $query,
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
                return AudiencesContact::fromJson($json);
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
     * Archives a Contact.
     *
     * Example:
     * ```php
     * $client->audiences->postAudiencesContactsActionsArchive(
     *     'audience_id',
     *     'contact_id',
     * );
     * ```
     *
     * @param string $audienceId The unique ID for the audience.
     * @param string $contactId The unique id for the contact.
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
    public function postAudiencesContactsActionsArchive(string $audienceId, string $contactId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/audiences/{$audienceId}/contacts/{$contactId}/actions/archive",
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
     * Forgets a Contact.
     *
     * Example:
     * ```php
     * $client->audiences->postAudiencesContactsActionsForget(
     *     'audience_id',
     *     'contact_id',
     * );
     * ```
     *
     * @param string $audienceId The unique ID for the audience.
     * @param string $contactId The unique id for the contact.
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
    public function postAudiencesContactsActionsForget(string $audienceId, string $contactId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/audiences/{$audienceId}/contacts/{$contactId}/actions/forget",
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
}
