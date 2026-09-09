<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\GrowthHistory;

/**
 * A month-by-month summary of a specific list's growth activity.
 */
class ListGrowthHistoryListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListGrowthHistoryListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListGrowthHistoryListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<GrowthHistory> $history An array of objects, each representing a monthly growth report for a list.
     */
    #[JsonProperty('history'), ArrayType([GrowthHistory::class])]
    public ?array $history;

    /**
     * @var ?string $listId The list id.
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
     *   links?: ?array<ListGrowthHistoryListsResponseLinksItem>,
     *   history?: ?array<GrowthHistory>,
     *   listId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->history = $values['history'] ?? null;
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
