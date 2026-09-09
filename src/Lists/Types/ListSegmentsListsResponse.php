<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\List_;

/**
 * A list of available segments.
 */
class ListSegmentsListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListSegmentsListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListSegmentsListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $listId The list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?array<List_> $segments An array of objects, each representing a list segment.
     */
    #[JsonProperty('segments'), ArrayType([List_::class])]
    public ?array $segments;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListSegmentsListsResponseLinksItem>,
     *   listId?: ?string,
     *   segments?: ?array<List_>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->segments = $values['segments'] ?? null;
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
