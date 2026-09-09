<?php

namespace Mailchimp\Reports;

use Psr\Http\Client\ClientInterface;
use Mailchimp\Core\Client\RawClient;
use Mailchimp\Reports\Requests\ListReportsRequest;
use Mailchimp\Core\Pagination\Pager;
use Mailchimp\Types\CampaignReport;
use Mailchimp\Core\Pagination\OffsetPager;
use Mailchimp\Reports\Types\ListReportsResponse;
use Mailchimp\Reports\Requests\GetReportsRequest;
use Mailchimp\Exceptions\MailchimpException;
use Mailchimp\Exceptions\MailchimpApiException;
use Mailchimp\Core\Json\JsonApiRequest;
use Mailchimp\Environments;
use Mailchimp\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Mailchimp\Reports\Requests\ListAbuseReportsReportsRequest;
use Mailchimp\Reports\Types\ListAbuseReportsReportsResponse;
use Mailchimp\Reports\Requests\GetAbuseReportReportsRequest;
use Mailchimp\Types\AbuseComplaint;
use Mailchimp\Reports\Requests\ListAdviceReportsRequest;
use Mailchimp\Reports\Types\ListAdviceReportsResponse;
use Mailchimp\Reports\Requests\ListClickDetailsReportsRequest;
use Mailchimp\Types\ClickDetailReport;
use Mailchimp\Reports\Types\ListClickDetailsReportsResponse;
use Mailchimp\Reports\Requests\GetClickDetailReportsRequest;
use Mailchimp\Reports\Requests\ListClickDetailMembersReportsRequest;
use Mailchimp\Types\ClickDetailMember;
use Mailchimp\Reports\Types\ListClickDetailMembersReportsResponse;
use Mailchimp\Reports\Requests\GetClickDetailMemberReportsRequest;
use Mailchimp\Reports\Requests\ListDomainPerformanceReportsRequest;
use Mailchimp\Reports\Types\ListDomainPerformanceReportsResponse;
use Mailchimp\Reports\Requests\ListEcommerceProductActivityReportsRequest;
use Mailchimp\Reports\Types\ListEcommerceProductActivityReportsResponseProductsItem;
use Mailchimp\Reports\Types\ListEcommerceProductActivityReportsResponse;
use Mailchimp\Reports\Requests\ListEepurlReportsRequest;
use Mailchimp\Reports\Types\ListEepurlReportsResponse;
use Mailchimp\Reports\Requests\ListEmailActivityReportsRequest;
use Mailchimp\Types\EmailActivity;
use Mailchimp\Reports\Types\ListEmailActivityReportsResponse;
use Mailchimp\Reports\Requests\GetEmailActivityReportsRequest;
use Mailchimp\Reports\Requests\ListLocationsReportsRequest;
use Mailchimp\Reports\Types\ListLocationsReportsResponseLocationsItem;
use Mailchimp\Reports\Types\ListLocationsReportsResponse;
use Mailchimp\Reports\Requests\ListOpenDetailsReportsRequest;
use Mailchimp\Types\OpenActivity;
use Mailchimp\Reports\Types\ListOpenDetailsReportsResponse;
use Mailchimp\Reports\Requests\GetOpenDetailReportsRequest;
use Mailchimp\Reports\Requests\ListSentToReportsRequest;
use Mailchimp\Types\SentTo;
use Mailchimp\Reports\Types\ListSentToReportsResponse;
use Mailchimp\Reports\Requests\GetSentToReportsRequest;
use Mailchimp\Reports\Requests\ListSubReportsReportsRequest;
use Mailchimp\Reports\Types\ListSubReportsReportsResponse;
use Mailchimp\Reports\Requests\ListUnsubscribedReportsRequest;
use Mailchimp\Types\Unsubscribes;
use Mailchimp\Reports\Types\ListUnsubscribedReportsResponse;
use Mailchimp\Reports\Requests\GetUnsubscribedReportsRequest;
use Mailchimp\Core\Json\JsonSerializer;

class ReportsClient
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
     * Get campaign reports.
     *
     * Example:
     * ```php
     * $client->reports->list(
     *     new ListReportsRequest([]),
     * );
     * ```
     *
     * @param ListReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<CampaignReport>
     */
    public function list(ListReportsRequest $request = new ListReportsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListReportsRequest $request) => $this->_list($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListReportsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListReportsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListReportsResponse $response) => $response?->reports ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get report details for a specific sent campaign.
     *
     * Example:
     * ```php
     * $client->reports->get(
     *     'campaign_id',
     *     new GetReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param GetReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CampaignReport
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function get(string $campaignId, GetReportsRequest $request = new GetReportsRequest(), ?array $options = null): ?CampaignReport
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
                    path: "3.0/reports/{$campaignId}",
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
                return CampaignReport::fromJson($json);
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
     * Get a list of abuse complaints for a specific campaign.
     *
     * Example:
     * ```php
     * $client->reports->listAbuseReports(
     *     'campaign_id',
     *     new ListAbuseReportsReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListAbuseReportsReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListAbuseReportsReportsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listAbuseReports(string $campaignId, ListAbuseReportsReportsRequest $request = new ListAbuseReportsReportsRequest(), ?array $options = null): ?ListAbuseReportsReportsResponse
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
                    path: "3.0/reports/{$campaignId}/abuse-reports",
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
                return ListAbuseReportsReportsResponse::fromJson($json);
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
     * Get information about a specific abuse report for a campaign.
     *
     * Example:
     * ```php
     * $client->reports->getAbuseReport(
     *     'campaign_id',
     *     'report_id',
     *     new GetAbuseReportReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param string $reportId The id for the abuse report.
     * @param GetAbuseReportReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AbuseComplaint
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getAbuseReport(string $campaignId, string $reportId, GetAbuseReportReportsRequest $request = new GetAbuseReportReportsRequest(), ?array $options = null): ?AbuseComplaint
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
                    path: "3.0/reports/{$campaignId}/abuse-reports/{$reportId}",
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
                return AbuseComplaint::fromJson($json);
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
     * Get feedback based on a campaign's statistics. Advice feedback is based on campaign stats like opens, clicks, unsubscribes, bounces, and more.
     *
     * Example:
     * ```php
     * $client->reports->listAdvice(
     *     'campaign_id',
     *     new ListAdviceReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListAdviceReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListAdviceReportsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listAdvice(string $campaignId, ListAdviceReportsRequest $request = new ListAdviceReportsRequest(), ?array $options = null): ?ListAdviceReportsResponse
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
                    path: "3.0/reports/{$campaignId}/advice",
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
                return ListAdviceReportsResponse::fromJson($json);
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
     * Get information about clicks on specific links in your Mailchimp campaigns.
     *
     * Example:
     * ```php
     * $client->reports->listClickDetails(
     *     'campaign_id',
     *     new ListClickDetailsReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListClickDetailsReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ClickDetailReport>
     */
    public function listClickDetails(string $campaignId, ListClickDetailsReportsRequest $request = new ListClickDetailsReportsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListClickDetailsReportsRequest $request) => $this->_listClickDetails($campaignId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListClickDetailsReportsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListClickDetailsReportsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListClickDetailsReportsResponse $response) => $response?->urlsClicked ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get click details for a specific link in a campaign.
     *
     * Example:
     * ```php
     * $client->reports->getClickDetail(
     *     'campaign_id',
     *     'link_id',
     *     new GetClickDetailReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param string $linkId The id for the link.
     * @param GetClickDetailReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ClickDetailReport
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getClickDetail(string $campaignId, string $linkId, GetClickDetailReportsRequest $request = new GetClickDetailReportsRequest(), ?array $options = null): ?ClickDetailReport
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->filterBots != null) {
            $query['filter_bots'] = $request->filterBots;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/reports/{$campaignId}/click-details/{$linkId}",
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
                return ClickDetailReport::fromJson($json);
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
     * Get information about list members who clicked on a specific link in a campaign.
     *
     * Example:
     * ```php
     * $client->reports->listClickDetailMembers(
     *     'campaign_id',
     *     'link_id',
     *     new ListClickDetailMembersReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param string $linkId The id for the link.
     * @param ListClickDetailMembersReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ClickDetailMember>
     */
    public function listClickDetailMembers(string $campaignId, string $linkId, ListClickDetailMembersReportsRequest $request = new ListClickDetailMembersReportsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListClickDetailMembersReportsRequest $request) => $this->_listClickDetailMembers($campaignId, $linkId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListClickDetailMembersReportsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListClickDetailMembersReportsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListClickDetailMembersReportsResponse $response) => $response?->members ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get information about a specific subscriber who clicked a link in a specific campaign.
     *
     * Example:
     * ```php
     * $client->reports->getClickDetailMember(
     *     'campaign_id',
     *     'link_id',
     *     'subscriber_hash',
     *     new GetClickDetailMemberReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param string $linkId The id for the link.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address.
     * @param GetClickDetailMemberReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ClickDetailMember
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getClickDetailMember(string $campaignId, string $linkId, string $subscriberHash, GetClickDetailMemberReportsRequest $request = new GetClickDetailMemberReportsRequest(), ?array $options = null): ?ClickDetailMember
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
                    path: "3.0/reports/{$campaignId}/click-details/{$linkId}/members/{$subscriberHash}",
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
                return ClickDetailMember::fromJson($json);
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
     * Get statistics for the top-performing email domains in a campaign.
     *
     * Example:
     * ```php
     * $client->reports->listDomainPerformance(
     *     'campaign_id',
     *     new ListDomainPerformanceReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListDomainPerformanceReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListDomainPerformanceReportsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listDomainPerformance(string $campaignId, ListDomainPerformanceReportsRequest $request = new ListDomainPerformanceReportsRequest(), ?array $options = null): ?ListDomainPerformanceReportsResponse
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
                    path: "3.0/reports/{$campaignId}/domain-performance",
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
                return ListDomainPerformanceReportsResponse::fromJson($json);
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
     * Get breakdown of product activity for a campaign
     *
     * Example:
     * ```php
     * $client->reports->listEcommerceProductActivity(
     *     'campaign_id',
     *     new ListEcommerceProductActivityReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListEcommerceProductActivityReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ListEcommerceProductActivityReportsResponseProductsItem>
     */
    public function listEcommerceProductActivity(string $campaignId, ListEcommerceProductActivityReportsRequest $request = new ListEcommerceProductActivityReportsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListEcommerceProductActivityReportsRequest $request) => $this->_listEcommerceProductActivity($campaignId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListEcommerceProductActivityReportsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListEcommerceProductActivityReportsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListEcommerceProductActivityReportsResponse $response) => $response?->products ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get a summary of social activity for the campaign, tracked by EepURL.
     *
     * Example:
     * ```php
     * $client->reports->listEepurl(
     *     'campaign_id',
     *     new ListEepurlReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListEepurlReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListEepurlReportsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listEepurl(string $campaignId, ListEepurlReportsRequest $request = new ListEepurlReportsRequest(), ?array $options = null): ?ListEepurlReportsResponse
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
                    path: "3.0/reports/{$campaignId}/eepurl",
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
                return ListEepurlReportsResponse::fromJson($json);
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
     * Get a list of member's subscriber activity in a specific campaign.
     *
     * Example:
     * ```php
     * $client->reports->listEmailActivity(
     *     'campaign_id',
     *     new ListEmailActivityReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListEmailActivityReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<EmailActivity>
     */
    public function listEmailActivity(string $campaignId, ListEmailActivityReportsRequest $request = new ListEmailActivityReportsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListEmailActivityReportsRequest $request) => $this->_listEmailActivity($campaignId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListEmailActivityReportsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListEmailActivityReportsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListEmailActivityReportsResponse $response) => $response?->emails ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get a specific list member's activity in a campaign including opens, clicks, and bounces.
     *
     * Example:
     * ```php
     * $client->reports->getEmailActivity(
     *     'campaign_id',
     *     'subscriber_hash',
     *     new GetEmailActivityReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address.
     * @param GetEmailActivityReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?EmailActivity
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getEmailActivity(string $campaignId, string $subscriberHash, GetEmailActivityReportsRequest $request = new GetEmailActivityReportsRequest(), ?array $options = null): ?EmailActivity
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->since != null) {
            $query['since'] = $request->since;
        }
        if ($request->filterBots != null) {
            $query['filter_bots'] = $request->filterBots;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/reports/{$campaignId}/email-activity/{$subscriberHash}",
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
                return EmailActivity::fromJson($json);
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
     * Get top open locations for a specific campaign.
     *
     * Example:
     * ```php
     * $client->reports->listLocations(
     *     'campaign_id',
     *     new ListLocationsReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListLocationsReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ListLocationsReportsResponseLocationsItem>
     */
    public function listLocations(string $campaignId, ListLocationsReportsRequest $request = new ListLocationsReportsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListLocationsReportsRequest $request) => $this->_listLocations($campaignId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListLocationsReportsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListLocationsReportsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListLocationsReportsResponse $response) => $response?->locations ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get detailed information about any campaign emails that were opened by a list member.
     *
     * Example:
     * ```php
     * $client->reports->listOpenDetails(
     *     'campaign_id',
     *     new ListOpenDetailsReportsRequest([
     *         'since' => '2016-04-12 12:00:00',
     *     ]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListOpenDetailsReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<OpenActivity>
     */
    public function listOpenDetails(string $campaignId, ListOpenDetailsReportsRequest $request = new ListOpenDetailsReportsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListOpenDetailsReportsRequest $request) => $this->_listOpenDetails($campaignId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListOpenDetailsReportsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListOpenDetailsReportsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListOpenDetailsReportsResponse $response) => $response?->members ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get information about a specific subscriber who opened a campaign.
     *
     * Example:
     * ```php
     * $client->reports->getOpenDetail(
     *     'campaign_id',
     *     'subscriber_hash',
     *     new GetOpenDetailReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address.
     * @param GetOpenDetailReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?OpenActivity
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getOpenDetail(string $campaignId, string $subscriberHash, GetOpenDetailReportsRequest $request = new GetOpenDetailReportsRequest(), ?array $options = null): ?OpenActivity
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->filterBots != null) {
            $query['filter_bots'] = $request->filterBots;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/reports/{$campaignId}/open-details/{$subscriberHash}",
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
                return OpenActivity::fromJson($json);
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
     * Get information about campaign recipients.
     *
     * Example:
     * ```php
     * $client->reports->listSentTo(
     *     'campaign_id',
     *     new ListSentToReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListSentToReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<SentTo>
     */
    public function listSentTo(string $campaignId, ListSentToReportsRequest $request = new ListSentToReportsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListSentToReportsRequest $request) => $this->_listSentTo($campaignId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListSentToReportsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListSentToReportsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListSentToReportsResponse $response) => $response?->sentTo ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get information about a specific campaign recipient.
     *
     * Example:
     * ```php
     * $client->reports->getSentTo(
     *     'campaign_id',
     *     'subscriber_hash',
     *     new GetSentToReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address.
     * @param GetSentToReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SentTo
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getSentTo(string $campaignId, string $subscriberHash, GetSentToReportsRequest $request = new GetSentToReportsRequest(), ?array $options = null): ?SentTo
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
                    path: "3.0/reports/{$campaignId}/sent-to/{$subscriberHash}",
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
                return SentTo::fromJson($json);
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
     * Get a list of reports with child campaigns for a specific parent campaign.
     *
     * Example:
     * ```php
     * $client->reports->listSubReports(
     *     'campaign_id',
     *     new ListSubReportsReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListSubReportsReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSubReportsReportsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listSubReports(string $campaignId, ListSubReportsReportsRequest $request = new ListSubReportsReportsRequest(), ?array $options = null): ?ListSubReportsReportsResponse
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
                    path: "3.0/reports/{$campaignId}/sub-reports",
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
                return ListSubReportsReportsResponse::fromJson($json);
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
     * Get information about members who have unsubscribed from a specific campaign.
     *
     * Example:
     * ```php
     * $client->reports->listUnsubscribed(
     *     'campaign_id',
     *     new ListUnsubscribedReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListUnsubscribedReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<Unsubscribes>
     */
    public function listUnsubscribed(string $campaignId, ListUnsubscribedReportsRequest $request = new ListUnsubscribedReportsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListUnsubscribedReportsRequest $request) => $this->_listUnsubscribed($campaignId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListUnsubscribedReportsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListUnsubscribedReportsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListUnsubscribedReportsResponse $response) => $response?->unsubscribes ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get information about a specific list member who unsubscribed from a campaign.
     *
     * Example:
     * ```php
     * $client->reports->getUnsubscribed(
     *     'campaign_id',
     *     'subscriber_hash',
     *     new GetUnsubscribedReportsRequest([]),
     * );
     * ```
     *
     * @param string $campaignId The unique id for the campaign.
     * @param string $subscriberHash The MD5 hash of the lowercase version of the list member's email address.
     * @param GetUnsubscribedReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Unsubscribes
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getUnsubscribed(string $campaignId, string $subscriberHash, GetUnsubscribedReportsRequest $request = new GetUnsubscribedReportsRequest(), ?array $options = null): ?Unsubscribes
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
                    path: "3.0/reports/{$campaignId}/unsubscribed/{$subscriberHash}",
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
                return Unsubscribes::fromJson($json);
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
     * Get campaign reports.
     *
     * @param ListReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListReportsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _list(ListReportsRequest $request = new ListReportsRequest(), ?array $options = null): ?ListReportsResponse
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
        if ($request->beforeSendTime != null) {
            $query['before_send_time'] = JsonSerializer::serializeDateTime($request->beforeSendTime);
        }
        if ($request->sinceSendTime != null) {
            $query['since_send_time'] = JsonSerializer::serializeDateTime($request->sinceSendTime);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/reports",
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
                return ListReportsResponse::fromJson($json);
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
     * Get information about clicks on specific links in your Mailchimp campaigns.
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListClickDetailsReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListClickDetailsReportsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listClickDetails(string $campaignId, ListClickDetailsReportsRequest $request = new ListClickDetailsReportsRequest(), ?array $options = null): ?ListClickDetailsReportsResponse
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
        if ($request->filterBots != null) {
            $query['filter_bots'] = $request->filterBots;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/reports/{$campaignId}/click-details",
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
                return ListClickDetailsReportsResponse::fromJson($json);
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
     * Get information about list members who clicked on a specific link in a campaign.
     *
     * @param string $campaignId The unique id for the campaign.
     * @param string $linkId The id for the link.
     * @param ListClickDetailMembersReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListClickDetailMembersReportsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listClickDetailMembers(string $campaignId, string $linkId, ListClickDetailMembersReportsRequest $request = new ListClickDetailMembersReportsRequest(), ?array $options = null): ?ListClickDetailMembersReportsResponse
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
                    path: "3.0/reports/{$campaignId}/click-details/{$linkId}/members",
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
                return ListClickDetailMembersReportsResponse::fromJson($json);
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
     * Get breakdown of product activity for a campaign
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListEcommerceProductActivityReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListEcommerceProductActivityReportsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listEcommerceProductActivity(string $campaignId, ListEcommerceProductActivityReportsRequest $request = new ListEcommerceProductActivityReportsRequest(), ?array $options = null): ?ListEcommerceProductActivityReportsResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/reports/{$campaignId}/ecommerce-product-activity",
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
                return ListEcommerceProductActivityReportsResponse::fromJson($json);
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
     * Get a list of member's subscriber activity in a specific campaign.
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListEmailActivityReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListEmailActivityReportsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listEmailActivity(string $campaignId, ListEmailActivityReportsRequest $request = new ListEmailActivityReportsRequest(), ?array $options = null): ?ListEmailActivityReportsResponse
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
        if ($request->since != null) {
            $query['since'] = $request->since;
        }
        if ($request->filterBots != null) {
            $query['filter_bots'] = $request->filterBots;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/reports/{$campaignId}/email-activity",
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
                return ListEmailActivityReportsResponse::fromJson($json);
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
     * Get top open locations for a specific campaign.
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListLocationsReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListLocationsReportsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listLocations(string $campaignId, ListLocationsReportsRequest $request = new ListLocationsReportsRequest(), ?array $options = null): ?ListLocationsReportsResponse
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
                    path: "3.0/reports/{$campaignId}/locations",
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
                return ListLocationsReportsResponse::fromJson($json);
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
     * Get detailed information about any campaign emails that were opened by a list member.
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListOpenDetailsReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListOpenDetailsReportsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listOpenDetails(string $campaignId, ListOpenDetailsReportsRequest $request = new ListOpenDetailsReportsRequest(), ?array $options = null): ?ListOpenDetailsReportsResponse
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
        if ($request->since != null) {
            $query['since'] = $request->since;
        }
        if ($request->sortField != null) {
            $query['sort_field'] = $request->sortField;
        }
        if ($request->sortDir != null) {
            $query['sort_dir'] = $request->sortDir;
        }
        if ($request->filterBots != null) {
            $query['filter_bots'] = $request->filterBots;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/reports/{$campaignId}/open-details",
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
                return ListOpenDetailsReportsResponse::fromJson($json);
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
     * Get information about campaign recipients.
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListSentToReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSentToReportsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listSentTo(string $campaignId, ListSentToReportsRequest $request = new ListSentToReportsRequest(), ?array $options = null): ?ListSentToReportsResponse
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
                    path: "3.0/reports/{$campaignId}/sent-to",
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
                return ListSentToReportsResponse::fromJson($json);
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
     * Get information about members who have unsubscribed from a specific campaign.
     *
     * @param string $campaignId The unique id for the campaign.
     * @param ListUnsubscribedReportsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListUnsubscribedReportsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listUnsubscribed(string $campaignId, ListUnsubscribedReportsRequest $request = new ListUnsubscribedReportsRequest(), ?array $options = null): ?ListUnsubscribedReportsResponse
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
                    path: "3.0/reports/{$campaignId}/unsubscribed",
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
                return ListUnsubscribedReportsResponse::fromJson($json);
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
