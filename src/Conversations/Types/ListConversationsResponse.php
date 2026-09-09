<?php

namespace Mailchimp\Conversations\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\Conversation;

/**
 * A collection of this account's tracked conversations.
 */
class ListConversationsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListConversationsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListConversationsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<Conversation> $conversations A list of conversations.
     */
    #[JsonProperty('conversations'), ArrayType([Conversation::class])]
    public ?array $conversations;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListConversationsResponseLinksItem>,
     *   conversations?: ?array<Conversation>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->conversations = $values['conversations'] ?? null;
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
