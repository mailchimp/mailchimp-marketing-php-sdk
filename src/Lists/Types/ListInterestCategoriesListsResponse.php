<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\InterestCategory;

/**
 * Information about this list's interest categories.
 */
class ListInterestCategoriesListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListInterestCategoriesListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListInterestCategoriesListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<InterestCategory> $categories This array contains individual interest categories.
     */
    #[JsonProperty('categories'), ArrayType([InterestCategory::class])]
    public ?array $categories;

    /**
     * @var ?string $listId The ID for the list that this category belongs to.
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
     *   links?: ?array<ListInterestCategoriesListsResponseLinksItem>,
     *   categories?: ?array<InterestCategory>,
     *   listId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->categories = $values['categories'] ?? null;
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
