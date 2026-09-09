<?php

namespace Mailchimp\Conversations;

use Psr\Http\Client\ClientInterface;
use Mailchimp\Core\Client\RawClient;
use Mailchimp\Conversations\Requests\ListConversationsRequest;
use Mailchimp\Core\Pagination\Pager;
use Mailchimp\Types\Conversation;
use Mailchimp\Core\Pagination\OffsetPager;
use Mailchimp\Conversations\Types\ListConversationsResponse;
use Mailchimp\Conversations\Requests\GetConversationsRequest;
use Mailchimp\Exceptions\MailchimpException;
use Mailchimp\Exceptions\MailchimpApiException;
use Mailchimp\Core\Json\JsonApiRequest;
use Mailchimp\Environments;
use Mailchimp\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Mailchimp\Conversations\Requests\ListMessagesConversationsRequest;
use Mailchimp\Conversations\Types\ListMessagesConversationsResponse;
use Mailchimp\Core\Json\JsonSerializer;
use Mailchimp\Conversations\Requests\GetMessageConversationsRequest;
use Mailchimp\Types\ConversationMessage;

class ConversationsClient
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
     * Get a list of conversations for the account. Conversations has been deprecated in favor of Inbox and these endpoints don't include Inbox data. Past Conversations are still available via this endpoint, but new campaign replies and other Inbox messages aren’t available using this endpoint.
     *
     * Example:
     * ```php
     * $client->conversations->list(
     *     new ListConversationsRequest([]),
     * );
     * ```
     *
     * @param ListConversationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<Conversation>
     */
    public function list(ListConversationsRequest $request = new ListConversationsRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListConversationsRequest $request) => $this->_list($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListConversationsRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListConversationsRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListConversationsResponse $response) => $response?->conversations ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get details about an individual conversation. Conversations has been deprecated in favor of Inbox and these endpoints don't include Inbox data. Past Conversations are still available via this endpoint, but new campaign replies and other Inbox messages aren’t available using this endpoint.
     *
     * Example:
     * ```php
     * $client->conversations->get(
     *     'conversation_id',
     *     new GetConversationsRequest([]),
     * );
     * ```
     *
     * @param string $conversationId The unique id for the conversation.
     * @param GetConversationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Conversation
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function get(string $conversationId, GetConversationsRequest $request = new GetConversationsRequest(), ?array $options = null): ?Conversation
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
                    path: "3.0/conversations/{$conversationId}",
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
                return Conversation::fromJson($json);
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
     * Get messages from a specific conversation. Conversations has been deprecated in favor of Inbox and these endpoints don't include Inbox data. Past Conversations are still available via this endpoint, but new campaign replies and other Inbox messages aren’t available using this endpoint.
     *
     * Example:
     * ```php
     * $client->conversations->listMessages(
     *     'conversation_id',
     *     new ListMessagesConversationsRequest([]),
     * );
     * ```
     *
     * @param string $conversationId The unique id for the conversation.
     * @param ListMessagesConversationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListMessagesConversationsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listMessages(string $conversationId, ListMessagesConversationsRequest $request = new ListMessagesConversationsRequest(), ?array $options = null): ?ListMessagesConversationsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->isRead != null) {
            $query['is_read'] = $request->isRead;
        }
        if ($request->beforeTimestamp != null) {
            $query['before_timestamp'] = JsonSerializer::serializeDateTime($request->beforeTimestamp);
        }
        if ($request->sinceTimestamp != null) {
            $query['since_timestamp'] = JsonSerializer::serializeDateTime($request->sinceTimestamp);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/conversations/{$conversationId}/messages",
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
                return ListMessagesConversationsResponse::fromJson($json);
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
     * Get an individual message in a conversation. Conversations has been deprecated in favor of Inbox and these endpoints don't include Inbox data. Past Conversations are still available via this endpoint, but new campaign replies and other Inbox messages aren’t available using this endpoint.
     *
     * Example:
     * ```php
     * $client->conversations->getMessage(
     *     'conversation_id',
     *     'message_id',
     *     new GetMessageConversationsRequest([]),
     * );
     * ```
     *
     * @param string $conversationId The unique id for the conversation.
     * @param string $messageId The unique id for the conversation message.
     * @param GetMessageConversationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ConversationMessage
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getMessage(string $conversationId, string $messageId, GetMessageConversationsRequest $request = new GetMessageConversationsRequest(), ?array $options = null): ?ConversationMessage
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
                    path: "3.0/conversations/{$conversationId}/messages/{$messageId}",
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
                return ConversationMessage::fromJson($json);
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
     * Get a list of conversations for the account. Conversations has been deprecated in favor of Inbox and these endpoints don't include Inbox data. Past Conversations are still available via this endpoint, but new campaign replies and other Inbox messages aren’t available using this endpoint.
     *
     * @param ListConversationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListConversationsResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _list(ListConversationsRequest $request = new ListConversationsRequest(), ?array $options = null): ?ListConversationsResponse
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
        if ($request->hasUnreadMessages != null) {
            $query['has_unread_messages'] = $request->hasUnreadMessages;
        }
        if ($request->listId != null) {
            $query['list_id'] = $request->listId;
        }
        if ($request->campaignId != null) {
            $query['campaign_id'] = $request->campaignId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/conversations",
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
                return ListConversationsResponse::fromJson($json);
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
