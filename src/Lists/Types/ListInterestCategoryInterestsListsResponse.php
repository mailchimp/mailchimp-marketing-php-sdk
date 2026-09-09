<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\Interest;

/**
 * A list of this category's interests
 */
class ListInterestCategoryInterestsListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListInterestCategoryInterestsListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListInterestCategoryInterestsListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $categoryId The id for the interest category.
     */
    #[JsonProperty('category_id')]
    public ?string $categoryId;

    /**
     * @var ?array<Interest> $interests An array of this category's interests
     */
    #[JsonProperty('interests'), ArrayType([Interest::class])]
    public ?array $interests;

    /**
     * @var ?string $listId The unique list id that the interests belong to.
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
     *   links?: ?array<ListInterestCategoryInterestsListsResponseLinksItem>,
     *   categoryId?: ?string,
     *   interests?: ?array<Interest>,
     *   listId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->categoryId = $values['categoryId'] ?? null;
        $this->interests = $values['interests'] ?? null;
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
