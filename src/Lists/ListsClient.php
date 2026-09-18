<?php

namespace Mailchimp\Lists;

use Psr\Http\Client\ClientInterface;
use Mailchimp\Core\Client\RawClient;
use Mailchimp\Lists\Requests\ListListsRequest;
use Mailchimp\Core\Pagination\Pager;
use Mailchimp\Types\SubscriberList;
use Mailchimp\Core\Pagination\OffsetPager;
use Mailchimp\Lists\Types\ListListsResponse;
use Mailchimp\Lists\Requests\CreateListsRequest;
use Mailchimp\Exceptions\MailchimpException;
use Mailchimp\Exceptions\MailchimpApiException;
use Mailchimp\Core\Json\JsonApiRequest;
use Mailchimp\Environments;
use Mailchimp\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Mailchimp\Lists\Requests\GetListsRequest;
use Mailchimp\Lists\Requests\BatchSubscribeOrUnsubscribeListsRequest;
use Mailchimp\Lists\Types\BatchSubscribeOrUnsubscribeListsResponse;
use Mailchimp\Lists\Requests\UpdateListsRequest;
use Mailchimp\Lists\Requests\ListAbuseReportsListsRequest;
use Mailchimp\Types\ListsAbuseReports;
use Mailchimp\Lists\Types\ListAbuseReportsListsResponse;
use Mailchimp\Lists\Requests\GetAbuseReportListsRequest;
use Mailchimp\Lists\Requests\ListActivityListsRequest;
use Mailchimp\Lists\Types\ListActivityListsResponseActivityItem;
use Mailchimp\Lists\Types\ListActivityListsResponse;
use Mailchimp\Lists\Requests\ListClientsListsRequest;
use Mailchimp\Lists\Types\ListClientsListsResponse;
use Mailchimp\Lists\Requests\ListGrowthHistoryListsRequest;
use Mailchimp\Types\GrowthHistory;
use Mailchimp\Lists\Types\ListGrowthHistoryListsResponse;
use Mailchimp\Lists\Requests\GetGrowthHistoryListsRequest;
use Mailchimp\Lists\Requests\ListInterestCategoriesListsRequest;
use Mailchimp\Types\InterestCategory;
use Mailchimp\Lists\Types\ListInterestCategoriesListsResponse;
use Mailchimp\Lists\Requests\CreateInterestCategoryListsRequest;
use Mailchimp\Lists\Requests\GetInterestCategoryListsRequest;
use Mailchimp\Lists\Requests\UpdateInterestCategoryListsRequest;
use Mailchimp\Lists\Requests\ListInterestCategoryInterestsListsRequest;
use Mailchimp\Types\Interest;
use Mailchimp\Lists\Types\ListInterestCategoryInterestsListsResponse;
use Mailchimp\Lists\Requests\CreateInterestCategoryInterestListsRequest;
use Mailchimp\Lists\Requests\GetInterestCategoryInterestListsRequest;
use Mailchimp\Lists\Requests\UpdateInterestCategoryInterestListsRequest;
use Mailchimp\Lists\Requests\ListLocationsListsRequest;
use Mailchimp\Lists\Types\ListLocationsListsResponse;
use Mailchimp\Lists\Requests\ListMembersListsRequest;
use Mailchimp\Types\ListMembers;
use Mailchimp\Lists\Types\ListMembersListsResponse;
use Mailchimp\Lists\Requests\CreateMemberListsRequest;
use Mailchimp\Lists\Requests\GetMemberListsRequest;
use Mailchimp\Lists\Requests\UpsertMemberListsRequest;
use Mailchimp\Lists\Requests\UpdateMemberListsRequest;
use Mailchimp\Lists\Requests\ListMemberActivityListsRequest;
use Mailchimp\Lists\Types\ListMemberActivityListsResponse;
use Mailchimp\Lists\Requests\ListMemberActivityFeedListsRequest;
use Mailchimp\Lists\Types\ListMemberActivityFeedListsResponse;
use Mailchimp\Lists\Requests\ListMemberEventsListsRequest;
use Mailchimp\Lists\Types\ListMemberEventsListsResponseEventsItem;
use Mailchimp\Lists\Types\ListMemberEventsListsResponse;
use Mailchimp\Lists\Requests\CreateMemberEventListsRequest;
use Mailchimp\Lists\Requests\ListMemberGoalsListsRequest;
use Mailchimp\Lists\Types\ListMemberGoalsListsResponse;
use Mailchimp\Lists\Requests\ListMemberNotesListsRequest;
use Mailchimp\Types\MemberNotes;
use Mailchimp\Lists\Types\ListMemberNotesListsResponse;
use Mailchimp\Lists\Requests\CreateMemberNoteListsRequest;
use Mailchimp\Lists\Requests\GetMemberNoteListsRequest;
use Mailchimp\Lists\Requests\UpdateMemberNoteListsRequest;
use Mailchimp\Lists\Requests\ListMemberTagsListsRequest;
use Mailchimp\Lists\Types\ListMemberTagsListsResponseTagsItem;
use Mailchimp\Lists\Types\ListMemberTagsListsResponse;
use Mailchimp\Lists\Requests\CreateMemberTagListsRequest;
use Mailchimp\Lists\Requests\ListMergeFieldsListsRequest;
use Mailchimp\Types\MergeField;
use Mailchimp\Lists\Types\ListMergeFieldsListsResponse;
use Mailchimp\Lists\Requests\CreateMergeFieldListsRequest;
use Mailchimp\Lists\Requests\GetMergeFieldListsRequest;
use Mailchimp\Lists\Requests\UpdateMergeFieldListsRequest;
use Mailchimp\Lists\Requests\ListSegmentsListsRequest;
use Mailchimp\Types\List_;
use Mailchimp\Lists\Types\ListSegmentsListsResponse;
use Mailchimp\Lists\Requests\CreateSegmentListsRequest;
use Mailchimp\Lists\Requests\GetSegmentListsRequest;
use Mailchimp\Lists\Requests\BatchAddOrRemoveMembersListsRequest;
use Mailchimp\Lists\Types\BatchAddOrRemoveMembersListsResponse;
use Mailchimp\Lists\Requests\UpdateSegmentListsRequest;
use Mailchimp\Lists\Requests\ListSegmentMembersListsRequest;
use Mailchimp\Types\ListsSegmentsMembers;
use Mailchimp\Lists\Types\ListSegmentMembersListsResponse;
use Mailchimp\Lists\Requests\CreateSegmentMemberListsRequest;
use Mailchimp\Lists\Types\ListSignupFormsListsResponse;
use Mailchimp\Lists\Requests\CreateSignupFormListsRequest;
use Mailchimp\Types\SignupForm;
use Mailchimp\Core\Json\JsonDecoder;
use Mailchimp\Lists\Requests\CreateSurveyListsRequest;
use Mailchimp\Lists\Requests\UpdateSurveyListsRequest;
use Mailchimp\Lists\Requests\CreateListSurveyActionReplicateListsRequest;
use Mailchimp\Lists\Requests\ListTagSearchListsRequest;
use Mailchimp\Lists\Types\ListTagSearchListsResponse;
use Mailchimp\Lists\Types\ListWebhooksListsResponse;
use Mailchimp\Lists\Requests\CreateWebhookListsRequest;
use Mailchimp\Lists\Types\CreateWebhookListsResponse;
use Mailchimp\Types\ListWebhooks;
use Mailchimp\Lists\Requests\UpdateWebhookListsRequest;

class ListsClient
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
     * Get information about all lists in the account.
     *
     * Example:
     * ```php
     * $client->lists->list(
     *     new ListListsRequest([]),
     * );
     * ```
     *
     * @param ListListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<SubscriberList>
     */
    public function list(ListListsRequest $request = new ListListsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListListsRequest $request) => $this->_list($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListListsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListListsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListListsResponse $response) => $response?->lists ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Create a new list in your Mailchimp account.
     *
     * Example:
     * ```php
     * $client->lists->create(
     *     new CreateListsRequest([
     *         'campaignDefaults' => new CreateListsRequestCampaignDefaults([
     *             'fromEmail' => 'from_email',
     *             'fromName' => 'from_name',
     *             'language' => 'language',
     *             'subject' => 'subject',
     *         ]),
     *         'contact' => new CreateListsRequestContact([
     *             'address1' => 'address1',
     *             'city' => 'city',
     *             'company' => 'company',
     *             'country' => 'country',
     *         ]),
     *         'emailTypeOption' => true,
     *         'name' => 'name',
     *         'permissionReminder' => 'permission_reminder',
     *     ]),
     * );
     * ```
     *
     * @param CreateListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SubscriberList
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function create(CreateListsRequest $request, ?array $options = null): ?SubscriberList
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists",
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
                return SubscriberList::fromJson($json);
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
     * Get information about a specific list in your Mailchimp account. Results include list members who have signed up but haven't confirmed their subscription yet and unsubscribed or cleaned.
     *
     * Example:
     * ```php
     * $client->lists->get(
     *     'list_id',
     *     new GetListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param GetListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SubscriberList
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function get(string $listId, GetListsRequest $request = new GetListsRequest(), ?array $options = null): ?SubscriberList
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->includeTotalContacts != null) {
            $query['include_total_contacts'] = $request->includeTotalContacts;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}",
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
                return SubscriberList::fromJson($json);
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
     * Batch subscribe or unsubscribe list members.
     *
     * Example:
     * ```php
     * $client->lists->batchSubscribeOrUnsubscribe(
     *     'list_id',
     *     new BatchSubscribeOrUnsubscribeListsRequest([
     *         'members' => [],
     *     ]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param BatchSubscribeOrUnsubscribeListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?BatchSubscribeOrUnsubscribeListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function batchSubscribeOrUnsubscribe(string $listId, BatchSubscribeOrUnsubscribeListsRequest $request, ?array $options = null): ?BatchSubscribeOrUnsubscribeListsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->skipMergeValidation != null) {
            $query['skip_merge_validation'] = $request->skipMergeValidation;
        }
        if ($request->skipDuplicateCheck != null) {
            $query['skip_duplicate_check'] = $request->skipDuplicateCheck;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}",
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
                return BatchSubscribeOrUnsubscribeListsResponse::fromJson($json);
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
     * Delete a list from your Mailchimp account. If you delete a list, you'll lose the list history—including subscriber activity, unsubscribes, complaints, and bounces. You’ll also lose subscribers’ email addresses, unless you exported and backed up your list.
     *
     * Example:
     * ```php
     * $client->lists->delete(
     *     'list_id',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
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
    public function delete(string $listId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}",
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
     * Update the settings for a specific list.
     *
     * Example:
     * ```php
     * $client->lists->update(
     *     'list_id',
     *     new UpdateListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param UpdateListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SubscriberList
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function update(string $listId, UpdateListsRequest $request = new UpdateListsRequest(), ?array $options = null): ?SubscriberList
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}",
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
                return SubscriberList::fromJson($json);
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
     * Get all abuse reports for a specific list.
     *
     * Example:
     * ```php
     * $client->lists->listAbuseReports(
     *     'list_id',
     *     new ListAbuseReportsListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param ListAbuseReportsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ListsAbuseReports>
     */
    public function listAbuseReports(string $listId, ListAbuseReportsListsRequest $request = new ListAbuseReportsListsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListAbuseReportsListsRequest $request) => $this->_listAbuseReports($listId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListAbuseReportsListsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListAbuseReportsListsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListAbuseReportsListsResponse $response) => $response?->abuseReports ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get details about a specific abuse report.
     *
     * Example:
     * ```php
     * $client->lists->getAbuseReport(
     *     'list_id',
     *     'report_id',
     *     new GetAbuseReportListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $reportId The id for the abuse report.
     * @param GetAbuseReportListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListsAbuseReports
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getAbuseReport(string $listId, string $reportId, GetAbuseReportListsRequest $request = new GetAbuseReportListsRequest(), ?array $options = null): ?ListsAbuseReports
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/abuse-reports/{$reportId}",
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
                return ListsAbuseReports::fromJson($json);
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
     * Get up to the previous 180 days of daily detailed aggregated activity stats for a list, not including Automation activity.
     *
     * Example:
     * ```php
     * $client->lists->listActivity(
     *     'list_id',
     *     new ListActivityListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param ListActivityListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ListActivityListsResponseActivityItem>
     */
    public function listActivity(string $listId, ListActivityListsRequest $request = new ListActivityListsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListActivityListsRequest $request) => $this->_listActivity($listId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListActivityListsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListActivityListsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListActivityListsResponse $response) => $response?->activity ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get a list of the top email clients based on user-agent strings.
     *
     * Example:
     * ```php
     * $client->lists->listClients(
     *     'list_id',
     *     new ListClientsListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param ListClientsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListClientsListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listClients(string $listId, ListClientsListsRequest $request = new ListClientsListsRequest(), ?array $options = null): ?ListClientsListsResponse
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
                    path: "3.0/lists/{$listId}/clients",
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
                return ListClientsListsResponse::fromJson($json);
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
     * Get a month-by-month summary of a specific list's growth activity.
     *
     * Example:
     * ```php
     * $client->lists->listGrowthHistory(
     *     'list_id',
     *     new ListGrowthHistoryListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param ListGrowthHistoryListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<GrowthHistory>
     */
    public function listGrowthHistory(string $listId, ListGrowthHistoryListsRequest $request = new ListGrowthHistoryListsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListGrowthHistoryListsRequest $request) => $this->_listGrowthHistory($listId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListGrowthHistoryListsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListGrowthHistoryListsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListGrowthHistoryListsResponse $response) => $response?->history ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get a summary of a specific list's growth activity for a specific month and year.
     *
     * Example:
     * ```php
     * $client->lists->getGrowthHistory(
     *     'list_id',
     *     'month',
     *     new GetGrowthHistoryListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $month A specific month of list growth history.
     * @param GetGrowthHistoryListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GrowthHistory
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getGrowthHistory(string $listId, string $month, GetGrowthHistoryListsRequest $request = new GetGrowthHistoryListsRequest(), ?array $options = null): ?GrowthHistory
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
                    path: "3.0/lists/{$listId}/growth-history/{$month}",
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
                return GrowthHistory::fromJson($json);
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
     * Get information about a list's interest categories.
     *
     * Example:
     * ```php
     * $client->lists->listInterestCategories(
     *     'list_id',
     *     new ListInterestCategoriesListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param ListInterestCategoriesListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<InterestCategory>
     */
    public function listInterestCategories(string $listId, ListInterestCategoriesListsRequest $request = new ListInterestCategoriesListsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListInterestCategoriesListsRequest $request) => $this->_listInterestCategories($listId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListInterestCategoriesListsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListInterestCategoriesListsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListInterestCategoriesListsResponse $response) => $response?->categories ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Create a new interest category.
     *
     * Example:
     * ```php
     * $client->lists->createInterestCategory(
     *     'list_id',
     *     new CreateInterestCategoryListsRequest([
     *         'title' => 'title',
     *         'type' => CreateInterestCategoryListsRequestType::Checkboxes->value,
     *     ]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param CreateInterestCategoryListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?InterestCategory
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createInterestCategory(string $listId, CreateInterestCategoryListsRequest $request, ?array $options = null): ?InterestCategory
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/interest-categories",
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
                return InterestCategory::fromJson($json);
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
     * Get information about a specific interest category.
     *
     * Example:
     * ```php
     * $client->lists->getInterestCategory(
     *     'list_id',
     *     'interest_category_id',
     *     new GetInterestCategoryListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $interestCategoryId The unique ID for the interest category.
     * @param GetInterestCategoryListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?InterestCategory
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getInterestCategory(string $listId, string $interestCategoryId, GetInterestCategoryListsRequest $request = new GetInterestCategoryListsRequest(), ?array $options = null): ?InterestCategory
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
                    path: "3.0/lists/{$listId}/interest-categories/{$interestCategoryId}",
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
                return InterestCategory::fromJson($json);
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
     * Delete a specific interest category.
     *
     * Example:
     * ```php
     * $client->lists->deleteInterestCategory(
     *     'list_id',
     *     'interest_category_id',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $interestCategoryId The unique ID for the interest category.
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
    public function deleteInterestCategory(string $listId, string $interestCategoryId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/interest-categories/{$interestCategoryId}",
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
     * Update a specific interest category.
     *
     * Example:
     * ```php
     * $client->lists->updateInterestCategory(
     *     'list_id',
     *     'interest_category_id',
     *     new UpdateInterestCategoryListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $interestCategoryId The unique ID for the interest category.
     * @param UpdateInterestCategoryListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?InterestCategory
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateInterestCategory(string $listId, string $interestCategoryId, UpdateInterestCategoryListsRequest $request = new UpdateInterestCategoryListsRequest(), ?array $options = null): ?InterestCategory
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/interest-categories/{$interestCategoryId}",
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
                return InterestCategory::fromJson($json);
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
     * Get a list of this category's interests.
     *
     * Example:
     * ```php
     * $client->lists->listInterestCategoryInterests(
     *     'list_id',
     *     'interest_category_id',
     *     new ListInterestCategoryInterestsListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $interestCategoryId The unique ID for the interest category.
     * @param ListInterestCategoryInterestsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<Interest>
     */
    public function listInterestCategoryInterests(string $listId, string $interestCategoryId, ListInterestCategoryInterestsListsRequest $request = new ListInterestCategoryInterestsListsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListInterestCategoryInterestsListsRequest $request) => $this->_listInterestCategoryInterests($listId, $interestCategoryId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListInterestCategoryInterestsListsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListInterestCategoryInterestsListsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListInterestCategoryInterestsListsResponse $response) => $response?->interests ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Create a new interest or 'group name' for a specific category.
     *
     * Example:
     * ```php
     * $client->lists->createInterestCategoryInterest(
     *     'list_id',
     *     'interest_category_id',
     *     new CreateInterestCategoryInterestListsRequest([
     *         'name' => 'name',
     *     ]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $interestCategoryId The unique ID for the interest category.
     * @param CreateInterestCategoryInterestListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Interest
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createInterestCategoryInterest(string $listId, string $interestCategoryId, CreateInterestCategoryInterestListsRequest $request, ?array $options = null): ?Interest
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/interest-categories/{$interestCategoryId}/interests",
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
                return Interest::fromJson($json);
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
     * Get interests or 'group names' for a specific category.
     *
     * Example:
     * ```php
     * $client->lists->getInterestCategoryInterest(
     *     'list_id',
     *     'interest_category_id',
     *     'interest_id',
     *     new GetInterestCategoryInterestListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $interestCategoryId The unique ID for the interest category.
     * @param string $interestId The specific interest or 'group name'.
     * @param GetInterestCategoryInterestListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Interest
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getInterestCategoryInterest(string $listId, string $interestCategoryId, string $interestId, GetInterestCategoryInterestListsRequest $request = new GetInterestCategoryInterestListsRequest(), ?array $options = null): ?Interest
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
                    path: "3.0/lists/{$listId}/interest-categories/{$interestCategoryId}/interests/{$interestId}",
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
                return Interest::fromJson($json);
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
     * Delete interests or group names in a specific category.
     *
     * Example:
     * ```php
     * $client->lists->deleteInterestCategoryInterest(
     *     'list_id',
     *     'interest_category_id',
     *     'interest_id',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $interestCategoryId The unique ID for the interest category.
     * @param string $interestId The specific interest or 'group name'.
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
    public function deleteInterestCategoryInterest(string $listId, string $interestCategoryId, string $interestId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/interest-categories/{$interestCategoryId}/interests/{$interestId}",
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
     * Update interests or 'group names' for a specific category.
     *
     * Example:
     * ```php
     * $client->lists->updateInterestCategoryInterest(
     *     'list_id',
     *     'interest_category_id',
     *     'interest_id',
     *     new UpdateInterestCategoryInterestListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $interestCategoryId The unique ID for the interest category.
     * @param string $interestId The specific interest or 'group name'.
     * @param UpdateInterestCategoryInterestListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Interest
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateInterestCategoryInterest(string $listId, string $interestCategoryId, string $interestId, UpdateInterestCategoryInterestListsRequest $request = new UpdateInterestCategoryInterestListsRequest(), ?array $options = null): ?Interest
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/interest-categories/{$interestCategoryId}/interests/{$interestId}",
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
                return Interest::fromJson($json);
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
     * Get the locations (countries) that the list's subscribers have been tagged to based on geocoding their IP address.
     *
     * Example:
     * ```php
     * $client->lists->listLocations(
     *     'list_id',
     *     new ListLocationsListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param ListLocationsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListLocationsListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listLocations(string $listId, ListLocationsListsRequest $request = new ListLocationsListsRequest(), ?array $options = null): ?ListLocationsListsResponse
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
                    path: "3.0/lists/{$listId}/locations",
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
                return ListLocationsListsResponse::fromJson($json);
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
     * Get information about members in a specific Mailchimp list.
     *
     * Example:
     * ```php
     * $client->lists->listMembers(
     *     'list_id',
     *     new ListMembersListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param ListMembersListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ListMembers>
     */
    public function listMembers(string $listId, ListMembersListsRequest $request = new ListMembersListsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListMembersListsRequest $request) => $this->_listMembers($listId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListMembersListsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListMembersListsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListMembersListsResponse $response) => $response?->members ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a new member to the list.
     *
     * Example:
     * ```php
     * $client->lists->createMember(
     *     'list_id',
     *     new CreateMemberListsRequest([
     *         'emailAddress' => 'email_address',
     *         'status' => CreateMemberListsRequestStatus::Subscribed->value,
     *     ]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param CreateMemberListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListMembers
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createMember(string $listId, CreateMemberListsRequest $request, ?array $options = null): ?ListMembers
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->skipMergeValidation != null) {
            $query['skip_merge_validation'] = $request->skipMergeValidation;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members",
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
                return ListMembers::fromJson($json);
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
     * Get information about a specific list member, including a currently subscribed, unsubscribed, or bounced member.
     *
     * Example:
     * ```php
     * $client->lists->getMember(
     *     'list_id',
     *     'subscriber_hash',
     *     new GetMemberListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param GetMemberListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListMembers
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getMember(string $listId, string $subscriberHash, GetMemberListsRequest $request = new GetMemberListsRequest(), ?array $options = null): ?ListMembers
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
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}",
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
                return ListMembers::fromJson($json);
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
     * Add or update a list member.
     *
     * Example:
     * ```php
     * $client->lists->upsertMember(
     *     'list_id',
     *     'subscriber_hash',
     *     new UpsertMemberListsRequest([
     *         'emailAddress' => 'email_address',
     *     ]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param UpsertMemberListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListMembers
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function upsertMember(string $listId, string $subscriberHash, UpsertMemberListsRequest $request, ?array $options = null): ?ListMembers
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->skipMergeValidation != null) {
            $query['skip_merge_validation'] = $request->skipMergeValidation;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}",
                    method: HttpMethod::PUT,
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
                return ListMembers::fromJson($json);
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
     * Archive a list member. To permanently delete, use the delete-permanent action.
     *
     * Example:
     * ```php
     * $client->lists->deleteMember(
     *     'list_id',
     *     'subscriber_hash',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
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
    public function deleteMember(string $listId, string $subscriberHash, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}",
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
     * Update information for a specific list member.
     *
     * Example:
     * ```php
     * $client->lists->updateMember(
     *     'list_id',
     *     'subscriber_hash',
     *     new UpdateMemberListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param UpdateMemberListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListMembers
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateMember(string $listId, string $subscriberHash, UpdateMemberListsRequest $request = new UpdateMemberListsRequest(), ?array $options = null): ?ListMembers
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->skipMergeValidation != null) {
            $query['skip_merge_validation'] = $request->skipMergeValidation;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}",
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
                return ListMembers::fromJson($json);
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
     * Delete all personally identifiable information related to a list member, and remove them from a list. This will make it impossible to re-import the list member.
     *
     * Example:
     * ```php
     * $client->lists->createMemberActionDeletePermanent(
     *     'list_id',
     *     'subscriber_hash',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address.
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
    public function createMemberActionDeletePermanent(string $listId, string $subscriberHash, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}/actions/delete-permanent",
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
     * Get the last 50 events of a member's activity on a specific list, including opens, clicks, and unsubscribes.
     *
     * Example:
     * ```php
     * $client->lists->listMemberActivity(
     *     'list_id',
     *     'subscriber_hash',
     *     new ListMemberActivityListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param ListMemberActivityListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListMemberActivityListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listMemberActivity(string $listId, string $subscriberHash, ListMemberActivityListsRequest $request = new ListMemberActivityListsRequest(), ?array $options = null): ?ListMemberActivityListsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->action != null) {
            $query['action'] = $request->action;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}/activity",
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
                return ListMemberActivityListsResponse::fromJson($json);
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
     * Get a member's activity on a specific list, including opens, clicks, and unsubscribes.
     *
     * Example:
     * ```php
     * $client->lists->listMemberActivityFeed(
     *     'list_id',
     *     'subscriber_hash',
     *     new ListMemberActivityFeedListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param ListMemberActivityFeedListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<mixed>
     */
    public function listMemberActivityFeed(string $listId, string $subscriberHash, ListMemberActivityFeedListsRequest $request = new ListMemberActivityFeedListsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListMemberActivityFeedListsRequest $request) => $this->_listMemberActivityFeed($listId, $subscriberHash, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListMemberActivityFeedListsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListMemberActivityFeedListsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListMemberActivityFeedListsResponse $response) => $response?->activity ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get events for a contact.
     *
     * Example:
     * ```php
     * $client->lists->listMemberEvents(
     *     'list_id',
     *     'subscriber_hash',
     *     new ListMemberEventsListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param ListMemberEventsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ListMemberEventsListsResponseEventsItem>
     */
    public function listMemberEvents(string $listId, string $subscriberHash, ListMemberEventsListsRequest $request = new ListMemberEventsListsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListMemberEventsListsRequest $request) => $this->_listMemberEvents($listId, $subscriberHash, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListMemberEventsListsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListMemberEventsListsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListMemberEventsListsResponse $response) => $response?->events ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add an event for a list member.
     *
     * Example:
     * ```php
     * $client->lists->createMemberEvent(
     *     'list_id',
     *     'subscriber_hash',
     *     new CreateMemberEventListsRequest([
     *         'name' => 'name',
     *     ]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param CreateMemberEventListsRequest $request
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
    public function createMemberEvent(string $listId, string $subscriberHash, CreateMemberEventListsRequest $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}/events",
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
     * Get the last 50 Goal events for a member on a specific list.
     *
     * Example:
     * ```php
     * $client->lists->listMemberGoals(
     *     'list_id',
     *     'subscriber_hash',
     *     new ListMemberGoalsListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param ListMemberGoalsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListMemberGoalsListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listMemberGoals(string $listId, string $subscriberHash, ListMemberGoalsListsRequest $request = new ListMemberGoalsListsRequest(), ?array $options = null): ?ListMemberGoalsListsResponse
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
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}/goals",
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
                return ListMemberGoalsListsResponse::fromJson($json);
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
     * Get recent notes for a specific list member.
     *
     * Example:
     * ```php
     * $client->lists->listMemberNotes(
     *     'list_id',
     *     'subscriber_hash',
     *     new ListMemberNotesListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address.
     * @param ListMemberNotesListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<MemberNotes>
     */
    public function listMemberNotes(string $listId, string $subscriberHash, ListMemberNotesListsRequest $request = new ListMemberNotesListsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListMemberNotesListsRequest $request) => $this->_listMemberNotes($listId, $subscriberHash, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListMemberNotesListsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListMemberNotesListsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListMemberNotesListsResponse $response) => $response?->notes ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a new note for a specific subscriber.
     *
     * Example:
     * ```php
     * $client->lists->createMemberNote(
     *     'list_id',
     *     'subscriber_hash',
     *     new CreateMemberNoteListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address.
     * @param CreateMemberNoteListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?MemberNotes
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createMemberNote(string $listId, string $subscriberHash, CreateMemberNoteListsRequest $request = new CreateMemberNoteListsRequest(), ?array $options = null): ?MemberNotes
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}/notes",
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
                return MemberNotes::fromJson($json);
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
     * Get a specific note for a specific list member.
     *
     * Example:
     * ```php
     * $client->lists->getMemberNote(
     *     'list_id',
     *     'subscriber_hash',
     *     'note_id',
     *     new GetMemberNoteListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param string $noteId The id for the note.
     * @param GetMemberNoteListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?MemberNotes
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getMemberNote(string $listId, string $subscriberHash, string $noteId, GetMemberNoteListsRequest $request = new GetMemberNoteListsRequest(), ?array $options = null): ?MemberNotes
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
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}/notes/{$noteId}",
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
                return MemberNotes::fromJson($json);
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
     * Delete a specific note for a specific list member.
     *
     * Example:
     * ```php
     * $client->lists->deleteMemberNote(
     *     'list_id',
     *     'subscriber_hash',
     *     'note_id',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param string $noteId The id for the note.
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
    public function deleteMemberNote(string $listId, string $subscriberHash, string $noteId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}/notes/{$noteId}",
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
     * Update a specific note for a specific list member.
     *
     * Example:
     * ```php
     * $client->lists->updateMemberNote(
     *     'list_id',
     *     'subscriber_hash',
     *     'note_id',
     *     new UpdateMemberNoteListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param string $noteId The id for the note.
     * @param UpdateMemberNoteListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?MemberNotes
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateMemberNote(string $listId, string $subscriberHash, string $noteId, UpdateMemberNoteListsRequest $request = new UpdateMemberNoteListsRequest(), ?array $options = null): ?MemberNotes
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}/notes/{$noteId}",
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
                return MemberNotes::fromJson($json);
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
     * Get the tags on a list member.
     *
     * Example:
     * ```php
     * $client->lists->listMemberTags(
     *     'list_id',
     *     'subscriber_hash',
     *     new ListMemberTagsListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param ListMemberTagsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ListMemberTagsListsResponseTagsItem>
     */
    public function listMemberTags(string $listId, string $subscriberHash, ListMemberTagsListsRequest $request = new ListMemberTagsListsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListMemberTagsListsRequest $request) => $this->_listMemberTags($listId, $subscriberHash, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListMemberTagsListsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListMemberTagsListsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListMemberTagsListsResponse $response) => $response?->tags ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add or remove tags from a list member. If a tag that does not exist is passed in and set as 'active', a new tag will be created.
     *
     * Example:
     * ```php
     * $client->lists->createMemberTag(
     *     'list_id',
     *     'subscriber_hash',
     *     new CreateMemberTagListsRequest([
     *         'tags' => [
     *             new CreateMemberTagListsRequestTagsItem([
     *                 'name' => 'name',
     *                 'status' => CreateMemberTagListsRequestTagsItemStatus::Inactive->value,
     *             ]),
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address.
     * @param CreateMemberTagListsRequest $request
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
    public function createMemberTag(string $listId, string $subscriberHash, CreateMemberTagListsRequest $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}/tags",
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
     * Get a list of all merge fields for an audience.
     *
     * Example:
     * ```php
     * $client->lists->listMergeFields(
     *     'list_id',
     *     new ListMergeFieldsListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param ListMergeFieldsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<MergeField>
     */
    public function listMergeFields(string $listId, ListMergeFieldsListsRequest $request = new ListMergeFieldsListsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListMergeFieldsListsRequest $request) => $this->_listMergeFields($listId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListMergeFieldsListsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListMergeFieldsListsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListMergeFieldsListsResponse $response) => $response?->mergeFields ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a new merge field for a specific audience.
     *
     * Example:
     * ```php
     * $client->lists->createMergeField(
     *     'list_id',
     *     new CreateMergeFieldListsRequest([
     *         'name' => 'name',
     *         'type' => CreateMergeFieldListsRequestType::Text->value,
     *     ]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param CreateMergeFieldListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?MergeField
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createMergeField(string $listId, CreateMergeFieldListsRequest $request, ?array $options = null): ?MergeField
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/merge-fields",
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
                return MergeField::fromJson($json);
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
     * Get information about a specific merge field.
     *
     * Example:
     * ```php
     * $client->lists->getMergeField(
     *     'list_id',
     *     'merge_id',
     *     new GetMergeFieldListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $mergeId The id for the merge field.
     * @param GetMergeFieldListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?MergeField
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getMergeField(string $listId, string $mergeId, GetMergeFieldListsRequest $request = new GetMergeFieldListsRequest(), ?array $options = null): ?MergeField
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/merge-fields/{$mergeId}",
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
                return MergeField::fromJson($json);
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
     * Delete a specific merge field.
     *
     * Example:
     * ```php
     * $client->lists->deleteMergeField(
     *     'list_id',
     *     'merge_id',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $mergeId The id for the merge field.
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
    public function deleteMergeField(string $listId, string $mergeId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/merge-fields/{$mergeId}",
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
     * Update a specific merge field.
     *
     * Example:
     * ```php
     * $client->lists->updateMergeField(
     *     'list_id',
     *     'merge_id',
     *     new UpdateMergeFieldListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $mergeId The id for the merge field.
     * @param UpdateMergeFieldListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?MergeField
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateMergeField(string $listId, string $mergeId, UpdateMergeFieldListsRequest $request = new UpdateMergeFieldListsRequest(), ?array $options = null): ?MergeField
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/merge-fields/{$mergeId}",
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
                return MergeField::fromJson($json);
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
     * Get information about all available segments for a specific list.
     *
     * Example:
     * ```php
     * $client->lists->listSegments(
     *     'list_id',
     *     new ListSegmentsListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param ListSegmentsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<List_>
     */
    public function listSegments(string $listId, ListSegmentsListsRequest $request = new ListSegmentsListsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListSegmentsListsRequest $request) => $this->_listSegments($listId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListSegmentsListsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListSegmentsListsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListSegmentsListsResponse $response) => $response?->segments ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Create a new segment in a specific list.
     *
     * Example:
     * ```php
     * $client->lists->createSegment(
     *     'list_id',
     *     new CreateSegmentListsRequest([
     *         'name' => 'name',
     *     ]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param CreateSegmentListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?List_
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createSegment(string $listId, CreateSegmentListsRequest $request, ?array $options = null): ?List_
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/segments",
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
                return List_::fromJson($json);
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
     * Get information about a specific segment.
     *
     * Example:
     * ```php
     * $client->lists->getSegment(
     *     'list_id',
     *     'segment_id',
     *     new GetSegmentListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $segmentId The unique id for the segment.
     * @param GetSegmentListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?List_
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getSegment(string $listId, string $segmentId, GetSegmentListsRequest $request = new GetSegmentListsRequest(), ?array $options = null): ?List_
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->includeCleaned != null) {
            $query['include_cleaned'] = $request->includeCleaned;
        }
        if ($request->includeTransactional != null) {
            $query['include_transactional'] = $request->includeTransactional;
        }
        if ($request->includeUnsubscribed != null) {
            $query['include_unsubscribed'] = $request->includeUnsubscribed;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/segments/{$segmentId}",
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
                return List_::fromJson($json);
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
     * Batch add/remove list members to static segment
     *
     * Example:
     * ```php
     * $client->lists->batchAddOrRemoveMembers(
     *     'list_id',
     *     'segment_id',
     *     new BatchAddOrRemoveMembersListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $segmentId The unique id for the segment.
     * @param BatchAddOrRemoveMembersListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?BatchAddOrRemoveMembersListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function batchAddOrRemoveMembers(string $listId, string $segmentId, BatchAddOrRemoveMembersListsRequest $request = new BatchAddOrRemoveMembersListsRequest(), ?array $options = null): ?BatchAddOrRemoveMembersListsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/segments/{$segmentId}",
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
                return BatchAddOrRemoveMembersListsResponse::fromJson($json);
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
     * Delete a specific segment in a list.
     *
     * Example:
     * ```php
     * $client->lists->deleteSegment(
     *     'list_id',
     *     'segment_id',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $segmentId The unique id for the segment.
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
    public function deleteSegment(string $listId, string $segmentId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/segments/{$segmentId}",
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
     * Update a specific segment in a list.
     *
     * Example:
     * ```php
     * $client->lists->updateSegment(
     *     'list_id',
     *     'segment_id',
     *     new UpdateSegmentListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $segmentId The unique id for the segment.
     * @param UpdateSegmentListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?List_
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateSegment(string $listId, string $segmentId, UpdateSegmentListsRequest $request = new UpdateSegmentListsRequest(), ?array $options = null): ?List_
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/segments/{$segmentId}",
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
                return List_::fromJson($json);
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
     * Get information about members in a saved segment.
     *
     * Example:
     * ```php
     * $client->lists->listSegmentMembers(
     *     'list_id',
     *     'segment_id',
     *     new ListSegmentMembersListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $segmentId The unique id for the segment.
     * @param ListSegmentMembersListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ListsSegmentsMembers>
     */
    public function listSegmentMembers(string $listId, string $segmentId, ListSegmentMembersListsRequest $request = new ListSegmentMembersListsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListSegmentMembersListsRequest $request) => $this->_listSegmentMembers($listId, $segmentId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListSegmentMembersListsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListSegmentMembersListsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListSegmentMembersListsResponse $response) => $response?->members ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a member to a static segment.
     *
     * Example:
     * ```php
     * $client->lists->createSegmentMember(
     *     'list_id',
     *     'segment_id',
     *     new CreateSegmentMemberListsRequest([
     *         'emailAddress' => 'email_address',
     *     ]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $segmentId The unique id for the segment.
     * @param CreateSegmentMemberListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListsSegmentsMembers
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createSegmentMember(string $listId, string $segmentId, CreateSegmentMemberListsRequest $request, ?array $options = null): ?ListsSegmentsMembers
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/segments/{$segmentId}/members",
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
                return ListsSegmentsMembers::fromJson($json);
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
     * Remove a member from the specified static segment.
     *
     * Example:
     * ```php
     * $client->lists->deleteSegmentMember(
     *     'list_id',
     *     'segment_id',
     *     'subscriber_hash',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $segmentId The unique id for the segment.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address.
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
    public function deleteSegmentMember(string $listId, string $segmentId, string $subscriberHash, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/segments/{$segmentId}/members/{$subscriberHash}",
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
     * Get signup forms for a specific list.
     *
     * Example:
     * ```php
     * $client->lists->listSignupForms(
     *     'list_id',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSignupFormsListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listSignupForms(string $listId, ?array $options = null): ?ListSignupFormsListsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/signup-forms",
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
                return ListSignupFormsListsResponse::fromJson($json);
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
     * Customize a list's default signup form.
     *
     * Example:
     * ```php
     * $client->lists->createSignupForm(
     *     'list_id',
     *     new CreateSignupFormListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param CreateSignupFormListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SignupForm
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createSignupForm(string $listId, CreateSignupFormListsRequest $request = new CreateSignupFormListsRequest(), ?array $options = null): ?SignupForm
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/signup-forms",
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
                return SignupForm::fromJson($json);
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
     * Get information about all available surveys for a specific list.
     *
     * Example:
     * ```php
     * $client->lists->listSurveys(
     *     'list_id',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return mixed
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listSurveys(string $listId, ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/surveys",
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
                return JsonDecoder::decodeMixed($json);
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
     * Create a draft survey for an audience.
     *
     * Example:
     * ```php
     * $client->lists->createSurvey(
     *     'list_id',
     *     new CreateSurveyListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param CreateSurveyListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return mixed
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createSurvey(string $listId, CreateSurveyListsRequest $request = new CreateSurveyListsRequest(), ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/surveys",
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
                return JsonDecoder::decodeMixed($json);
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
     * Get details about a specific survey.
     *
     * Example:
     * ```php
     * $client->lists->getSurvey(
     *     'list_id',
     *     'survey_id',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $surveyId The ID of the survey.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return mixed
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getSurvey(string $listId, string $surveyId, ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/surveys/{$surveyId}",
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
                return JsonDecoder::decodeMixed($json);
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
     * Delete a survey.
     *
     * Example:
     * ```php
     * $client->lists->deleteSurvey(
     *     'list_id',
     *     'survey_id',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $surveyId The ID of the survey.
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
    public function deleteSurvey(string $listId, string $surveyId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/surveys/{$surveyId}",
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
     * Update a survey. When sections is provided, send the complete section list in display order. Any existing section not included is deleted.
     *
     * Example:
     * ```php
     * $client->lists->updateSurvey(
     *     'list_id',
     *     'survey_id',
     *     new UpdateSurveyListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $surveyId The ID of the survey.
     * @param UpdateSurveyListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return mixed
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateSurvey(string $listId, string $surveyId, UpdateSurveyListsRequest $request = new UpdateSurveyListsRequest(), ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/surveys/{$surveyId}",
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
                return JsonDecoder::decodeMixed($json);
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
     * Replicate a survey.
     *
     * Example:
     * ```php
     * $client->lists->createListSurveyActionReplicate(
     *     'list_id',
     *     'survey_id',
     *     new CreateListSurveyActionReplicateListsRequest([]),
     * );
     * ```
     *
     * @param string $listIdPathParam The unique ID for the list.
     * @param string $surveyId The ID of the survey.
     * @param CreateListSurveyActionReplicateListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return mixed
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createListSurveyActionReplicate(string $listIdPathParam, string $surveyId, CreateListSurveyActionReplicateListsRequest $request = new CreateListSurveyActionReplicateListsRequest(), ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listIdPathParam}/surveys/{$surveyId}/actions/replicate",
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
                return JsonDecoder::decodeMixed($json);
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
     * Search for tags on a list by name. If no name is provided, will return all tags on the list.
     *
     * Example:
     * ```php
     * $client->lists->listTagSearch(
     *     'list_id',
     *     new ListTagSearchListsRequest([]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param ListTagSearchListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListTagSearchListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listTagSearch(string $listId, ListTagSearchListsRequest $request = new ListTagSearchListsRequest(), ?array $options = null): ?ListTagSearchListsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->name != null) {
            $query['name'] = $request->name;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/tag-search",
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
                return ListTagSearchListsResponse::fromJson($json);
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
     * Get information about all webhooks for a specific list.
     *
     * Example:
     * ```php
     * $client->lists->listWebhooks(
     *     'list_id',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListWebhooksListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listWebhooks(string $listId, ?array $options = null): ?ListWebhooksListsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/webhooks",
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
                return ListWebhooksListsResponse::fromJson($json);
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
     * Create a new webhook for a specific list.
     *
     * Example:
     * ```php
     * $client->lists->createWebhook(
     *     'list_id',
     *     new CreateWebhookListsRequest([
     *         'body' => new AddWebhook([]),
     *     ]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param CreateWebhookListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateWebhookListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createWebhook(string $listId, CreateWebhookListsRequest $request, ?array $options = null): ?CreateWebhookListsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/webhooks",
                    method: HttpMethod::POST,
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
                return CreateWebhookListsResponse::fromJson($json);
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
     * Get information about a specific webhook.
     *
     * Example:
     * ```php
     * $client->lists->getWebhook(
     *     'list_id',
     *     'webhook_id',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $webhookId The webhook's id.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListWebhooks
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getWebhook(string $listId, string $webhookId, ?array $options = null): ?ListWebhooks
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/webhooks/{$webhookId}",
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
                return ListWebhooks::fromJson($json);
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
     * Delete a specific webhook in a list.
     *
     * Example:
     * ```php
     * $client->lists->deleteWebhook(
     *     'list_id',
     *     'webhook_id',
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $webhookId The webhook's id.
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
    public function deleteWebhook(string $listId, string $webhookId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/webhooks/{$webhookId}",
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
     * Update the settings for an existing webhook.
     *
     * Example:
     * ```php
     * $client->lists->updateWebhook(
     *     'list_id',
     *     'webhook_id',
     *     new UpdateWebhookListsRequest([
     *         'body' => new AddWebhook([]),
     *     ]),
     * );
     * ```
     *
     * @param string $listId The unique ID for the list.
     * @param string $webhookId The webhook's id.
     * @param UpdateWebhookListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListWebhooks
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateWebhook(string $listId, string $webhookId, UpdateWebhookListsRequest $request, ?array $options = null): ?ListWebhooks
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/webhooks/{$webhookId}",
                    method: HttpMethod::PATCH,
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
                return ListWebhooks::fromJson($json);
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
     * Get information about all lists in the account.
     *
     * @param ListListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _list(ListListsRequest $request = new ListListsRequest(), ?array $options = null): ?ListListsResponse
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
        if ($request->beforeDateCreated != null) {
            $query['before_date_created'] = $request->beforeDateCreated;
        }
        if ($request->sinceDateCreated != null) {
            $query['since_date_created'] = $request->sinceDateCreated;
        }
        if ($request->beforeCampaignLastSent != null) {
            $query['before_campaign_last_sent'] = $request->beforeCampaignLastSent;
        }
        if ($request->sinceCampaignLastSent != null) {
            $query['since_campaign_last_sent'] = $request->sinceCampaignLastSent;
        }
        if ($request->email != null) {
            $query['email'] = $request->email;
        }
        if ($request->sortField != null) {
            $query['sort_field'] = $request->sortField;
        }
        if ($request->sortDir != null) {
            $query['sort_dir'] = $request->sortDir;
        }
        if ($request->hasEcommerceStore != null) {
            $query['has_ecommerce_store'] = $request->hasEcommerceStore;
        }
        if ($request->includeTotalContacts != null) {
            $query['include_total_contacts'] = $request->includeTotalContacts;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists",
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
                return ListListsResponse::fromJson($json);
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
     * Get all abuse reports for a specific list.
     *
     * @param string $listId The unique ID for the list.
     * @param ListAbuseReportsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListAbuseReportsListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listAbuseReports(string $listId, ListAbuseReportsListsRequest $request = new ListAbuseReportsListsRequest(), ?array $options = null): ?ListAbuseReportsListsResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/abuse-reports",
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
                return ListAbuseReportsListsResponse::fromJson($json);
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
     * Get up to the previous 180 days of daily detailed aggregated activity stats for a list, not including Automation activity.
     *
     * @param string $listId The unique ID for the list.
     * @param ListActivityListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListActivityListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listActivity(string $listId, ListActivityListsRequest $request = new ListActivityListsRequest(), ?array $options = null): ?ListActivityListsResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/activity",
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
                return ListActivityListsResponse::fromJson($json);
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
     * Get a month-by-month summary of a specific list's growth activity.
     *
     * @param string $listId The unique ID for the list.
     * @param ListGrowthHistoryListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListGrowthHistoryListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listGrowthHistory(string $listId, ListGrowthHistoryListsRequest $request = new ListGrowthHistoryListsRequest(), ?array $options = null): ?ListGrowthHistoryListsResponse
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
                    path: "3.0/lists/{$listId}/growth-history",
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
                return ListGrowthHistoryListsResponse::fromJson($json);
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
     * Get information about a list's interest categories.
     *
     * @param string $listId The unique ID for the list.
     * @param ListInterestCategoriesListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListInterestCategoriesListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listInterestCategories(string $listId, ListInterestCategoriesListsRequest $request = new ListInterestCategoriesListsRequest(), ?array $options = null): ?ListInterestCategoriesListsResponse
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
                    path: "3.0/lists/{$listId}/interest-categories",
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
                return ListInterestCategoriesListsResponse::fromJson($json);
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
     * Get a list of this category's interests.
     *
     * @param string $listId The unique ID for the list.
     * @param string $interestCategoryId The unique ID for the interest category.
     * @param ListInterestCategoryInterestsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListInterestCategoryInterestsListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listInterestCategoryInterests(string $listId, string $interestCategoryId, ListInterestCategoryInterestsListsRequest $request = new ListInterestCategoryInterestsListsRequest(), ?array $options = null): ?ListInterestCategoryInterestsListsResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/interest-categories/{$interestCategoryId}/interests",
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
                return ListInterestCategoryInterestsListsResponse::fromJson($json);
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
     * Get information about members in a specific Mailchimp list.
     *
     * @param string $listId The unique ID for the list.
     * @param ListMembersListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListMembersListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listMembers(string $listId, ListMembersListsRequest $request = new ListMembersListsRequest(), ?array $options = null): ?ListMembersListsResponse
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
        if ($request->emailType != null) {
            $query['email_type'] = $request->emailType;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->sinceTimestampOpt != null) {
            $query['since_timestamp_opt'] = $request->sinceTimestampOpt;
        }
        if ($request->beforeTimestampOpt != null) {
            $query['before_timestamp_opt'] = $request->beforeTimestampOpt;
        }
        if ($request->sinceLastChanged != null) {
            $query['since_last_changed'] = $request->sinceLastChanged;
        }
        if ($request->beforeLastChanged != null) {
            $query['before_last_changed'] = $request->beforeLastChanged;
        }
        if ($request->uniqueEmailId != null) {
            $query['unique_email_id'] = $request->uniqueEmailId;
        }
        if ($request->vipOnly != null) {
            $query['vip_only'] = $request->vipOnly;
        }
        if ($request->interestCategoryId != null) {
            $query['interest_category_id'] = $request->interestCategoryId;
        }
        if ($request->interestIds != null) {
            $query['interest_ids'] = $request->interestIds;
        }
        if ($request->interestMatch != null) {
            $query['interest_match'] = $request->interestMatch;
        }
        if ($request->sortField != null) {
            $query['sort_field'] = $request->sortField;
        }
        if ($request->sortDir != null) {
            $query['sort_dir'] = $request->sortDir;
        }
        if ($request->sinceLastCampaign != null) {
            $query['since_last_campaign'] = $request->sinceLastCampaign;
        }
        if ($request->unsubscribedSince != null) {
            $query['unsubscribed_since'] = $request->unsubscribedSince;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members",
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
                return ListMembersListsResponse::fromJson($json);
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
     * Get a member's activity on a specific list, including opens, clicks, and unsubscribes.
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param ListMemberActivityFeedListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListMemberActivityFeedListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listMemberActivityFeed(string $listId, string $subscriberHash, ListMemberActivityFeedListsRequest $request = new ListMemberActivityFeedListsRequest(), ?array $options = null): ?ListMemberActivityFeedListsResponse
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
        if ($request->activityFilters != null) {
            $query['activity_filters'] = $request->activityFilters;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}/activity-feed",
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
                return ListMemberActivityFeedListsResponse::fromJson($json);
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
     * Get events for a contact.
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param ListMemberEventsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListMemberEventsListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listMemberEvents(string $listId, string $subscriberHash, ListMemberEventsListsRequest $request = new ListMemberEventsListsRequest(), ?array $options = null): ?ListMemberEventsListsResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}/events",
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
                return ListMemberEventsListsResponse::fromJson($json);
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
     * Get recent notes for a specific list member.
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address.
     * @param ListMemberNotesListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListMemberNotesListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listMemberNotes(string $listId, string $subscriberHash, ListMemberNotesListsRequest $request = new ListMemberNotesListsRequest(), ?array $options = null): ?ListMemberNotesListsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->sortField != null) {
            $query['sort_field'] = $request->sortField;
        }
        if ($request->sortDir != null) {
            $query['sort_dir'] = $request->sortDir;
        }
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}/notes",
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
                return ListMemberNotesListsResponse::fromJson($json);
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
     * Get the tags on a list member.
     *
     * @param string $listId The unique ID for the list.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address. This endpoint also accepts a list member's email address or contact_id.
     * @param ListMemberTagsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListMemberTagsListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listMemberTags(string $listId, string $subscriberHash, ListMemberTagsListsRequest $request = new ListMemberTagsListsRequest(), ?array $options = null): ?ListMemberTagsListsResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/members/{$subscriberHash}/tags",
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
                return ListMemberTagsListsResponse::fromJson($json);
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
     * Get a list of all merge fields for an audience.
     *
     * @param string $listId The unique ID for the list.
     * @param ListMergeFieldsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListMergeFieldsListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listMergeFields(string $listId, ListMergeFieldsListsRequest $request = new ListMergeFieldsListsRequest(), ?array $options = null): ?ListMergeFieldsListsResponse
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
        if ($request->required != null) {
            $query['required'] = $request->required;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/merge-fields",
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
                return ListMergeFieldsListsResponse::fromJson($json);
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
     * Get information about all available segments for a specific list.
     *
     * @param string $listId The unique ID for the list.
     * @param ListSegmentsListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSegmentsListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listSegments(string $listId, ListSegmentsListsRequest $request = new ListSegmentsListsRequest(), ?array $options = null): ?ListSegmentsListsResponse
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
        if ($request->sinceCreatedAt != null) {
            $query['since_created_at'] = $request->sinceCreatedAt;
        }
        if ($request->beforeCreatedAt != null) {
            $query['before_created_at'] = $request->beforeCreatedAt;
        }
        if ($request->includeCleaned != null) {
            $query['include_cleaned'] = $request->includeCleaned;
        }
        if ($request->includeTransactional != null) {
            $query['include_transactional'] = $request->includeTransactional;
        }
        if ($request->includeUnsubscribed != null) {
            $query['include_unsubscribed'] = $request->includeUnsubscribed;
        }
        if ($request->sinceUpdatedAt != null) {
            $query['since_updated_at'] = $request->sinceUpdatedAt;
        }
        if ($request->beforeUpdatedAt != null) {
            $query['before_updated_at'] = $request->beforeUpdatedAt;
        }
        if ($request->excludeType != null) {
            $query['exclude_type'] = $request->excludeType;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/segments",
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
                return ListSegmentsListsResponse::fromJson($json);
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
     * Get information about members in a saved segment.
     *
     * @param string $listId The unique ID for the list.
     * @param string $segmentId The unique id for the segment.
     * @param ListSegmentMembersListsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSegmentMembersListsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listSegmentMembers(string $listId, string $segmentId, ListSegmentMembersListsRequest $request = new ListSegmentMembersListsRequest(), ?array $options = null): ?ListSegmentMembersListsResponse
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
        if ($request->includeCleaned != null) {
            $query['include_cleaned'] = $request->includeCleaned;
        }
        if ($request->includeTransactional != null) {
            $query['include_transactional'] = $request->includeTransactional;
        }
        if ($request->includeUnsubscribed != null) {
            $query['include_unsubscribed'] = $request->includeUnsubscribed;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/lists/{$listId}/segments/{$segmentId}/members",
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
                return ListSegmentMembersListsResponse::fromJson($json);
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
