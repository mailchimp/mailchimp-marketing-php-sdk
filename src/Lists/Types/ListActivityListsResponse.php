<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Up to the previous 180 days of daily detailed aggregated activity stats for a specific list. Does not include AutoResponder or Automation activity.
 */
class ListActivityListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListActivityListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListActivityListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListActivityListsResponseActivityItem> $activity Recent list activity.
     */
    #[JsonProperty('activity'), ArrayType([ListActivityListsResponseActivityItem::class])]
    public ?array $activity;

    /**
     * @var ?string $listId The unique id for the list.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListActivityListsResponseLinksItem>,
     *   activity?: ?array<ListActivityListsResponseActivityItem>,
     *   listId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->activity = $values['activity'] ?? null;
        $this->listId = $values['listId'] ?? null;
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
