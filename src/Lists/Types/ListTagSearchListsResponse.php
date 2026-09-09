<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A list of tags matching the input query.
 */
class ListTagSearchListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListTagSearchListsResponseTagsItem> $tags A list of matching tags.
     */
    #[JsonProperty('tags'), ArrayType([ListTagSearchListsResponseTagsItem::class])]
    public ?array $tags;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   tags?: ?array<ListTagSearchListsResponseTagsItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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
