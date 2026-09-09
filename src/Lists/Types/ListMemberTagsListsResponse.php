<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A list of tags assigned to a list member.
 */
class ListMemberTagsListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListMemberTagsListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListMemberTagsListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListMemberTagsListsResponseTagsItem> $tags A list of tags assigned to the list member.
     */
    #[JsonProperty('tags'), ArrayType([ListMemberTagsListsResponseTagsItem::class])]
    public ?array $tags;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListMemberTagsListsResponseLinksItem>,
     *   tags?: ?array<ListMemberTagsListsResponseTagsItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->tags = $values['tags'] ?? null;
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
