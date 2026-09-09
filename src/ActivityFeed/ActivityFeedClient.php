<?php

namespace Mailchimp\ActivityFeed;

use Psr\Http\Client\ClientInterface;
use Mailchimp\Core\Client\RawClient;
use Mailchimp\ActivityFeed\Types\ListActivityFeedResponseItem;
use Mailchimp\Exceptions\MailchimpException;
use Mailchimp\Exceptions\MailchimpApiException;
use Mailchimp\Core\Json\JsonApiRequest;
use Mailchimp\Environments;
use Mailchimp\Core\Client\HttpMethod;
use Mailchimp\Core\Json\JsonDecoder;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Mailchimp\ActivityFeed\Requests\ListChimpChatterActivityFeedRequest;
use Mailchimp\Core\Pagination\Pager;
use Mailchimp\ActivityFeed\Types\ListChimpChatterActivityFeedResponseChimpChatterItem;
use Mailchimp\Core\Pagination\OffsetPager;
use Mailchimp\ActivityFeed\Types\ListChimpChatterActivityFeedResponse;

class ActivityFeedClient
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
     * Get information about the activity feed endpoint's resources.
     *
     * Example:
     * ```php
     * $client->activityFeed->list();
     * ```
     *
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<ListActivityFeedResponseItem>
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function list(?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/activity-feed",
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
                return JsonDecoder::decodeArray($json, [ListActivityFeedResponseItem::class]); // @phpstan-ignore-line
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
     * Return the Chimp Chatter for this account ordered by most recent.
     *
     * Example:
     * ```php
     * $client->activityFeed->listChimpChatter(
     *     new ListChimpChatterActivityFeedRequest([]),
     * );
     * ```
     *
     * @param ListChimpChatterActivityFeedRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ListChimpChatterActivityFeedResponseChimpChatterItem>
     */
    public function listChimpChatter(ListChimpChatterActivityFeedRequest $request = new ListChimpChatterActivityFeedRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListChimpChatterActivityFeedRequest $request) => $this->_listChimpChatter($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListChimpChatterActivityFeedRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListChimpChatterActivityFeedRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListChimpChatterActivityFeedResponse $response) => $response?->chimpChatter ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Return the Chimp Chatter for this account ordered by most recent.
     *
     * @param ListChimpChatterActivityFeedRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListChimpChatterActivityFeedResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listChimpChatter(ListChimpChatterActivityFeedRequest $request = new ListChimpChatterActivityFeedRequest(), ?array $options = null): ?ListChimpChatterActivityFeedResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
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
                    path: "3.0/activity-feed/chimp-chatter",
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
                return ListChimpChatterActivityFeedResponse::fromJson($json);
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
