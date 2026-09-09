<?php

namespace Mailchimp\Conversations\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ConversationMessage;

/**
 * Messages from a specific conversation.
 */
class ListMessagesConversationsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListMessagesConversationsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListMessagesConversationsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $conversationId A string that identifies this conversation.
     */
    #[JsonProperty('conversation_id')]
    public ?string $conversationId;

    /**
     * @var ?array<ConversationMessage> $conversationMessages An array of objects, each representing a conversation messages resources.
     */
    #[JsonProperty('conversation_messages'), ArrayType([ConversationMessage::class])]
    public ?array $conversationMessages;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListMessagesConversationsResponseLinksItem>,
     *   conversationId?: ?string,
     *   conversationMessages?: ?array<ConversationMessage>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->conversationId = $values['conversationId'] ?? null;
        $this->conversationMessages = $values['conversationMessages'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
