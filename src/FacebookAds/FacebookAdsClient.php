<?php

namespace Mailchimp\FacebookAds;

use Psr\Http\Client\ClientInterface;
use Mailchimp\Core\Client\RawClient;
use Mailchimp\FacebookAds\Requests\ListFacebookAdsRequest;
use Mailchimp\Core\Pagination\Pager;
use Mailchimp\Types\FacebookAds;
use Mailchimp\Core\Pagination\OffsetPager;
use Mailchimp\FacebookAds\Types\ListFacebookAdsResponse;
use Mailchimp\FacebookAds\Requests\GetFacebookAdsRequest;
use Mailchimp\Exceptions\MailchimpException;
use Mailchimp\Exceptions\MailchimpApiException;
use Mailchimp\Core\Json\JsonApiRequest;
use Mailchimp\Environments;
use Mailchimp\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;

class FacebookAdsClient
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
     * Get list of Facebook ads.
     *
     * Example:
     * ```php
     * $client->facebookAds->list(
     *     new ListFacebookAdsRequest([]),
     * );
     * ```
     *
     * @param ListFacebookAdsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<FacebookAds>
     */
    public function list(ListFacebookAdsRequest $request = new ListFacebookAdsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListFacebookAdsRequest $request) => $this->_list($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListFacebookAdsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListFacebookAdsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListFacebookAdsResponse $response) => $response?->facebookAds ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get details of a Facebook ad.
     *
     * Example:
     * ```php
     * $client->facebookAds->get(
     *     'outreach_id',
     *     new GetFacebookAdsRequest([]),
     * );
     * ```
     *
     * @param string $outreachId The outreach id.
     * @param GetFacebookAdsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?FacebookAds
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function get(string $outreachId, GetFacebookAdsRequest $request = new GetFacebookAdsRequest(), ?array $options = null): ?FacebookAds
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
                    path: "3.0/facebook-ads/{$outreachId}",
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
                return FacebookAds::fromJson($json);
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
     * Get list of Facebook ads.
     *
     * @param ListFacebookAdsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListFacebookAdsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _list(ListFacebookAdsRequest $request = new ListFacebookAdsRequest(), ?array $options = null): ?ListFacebookAdsResponse
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
                    path: "3.0/facebook-ads",
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
                return ListFacebookAdsResponse::fromJson($json);
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
