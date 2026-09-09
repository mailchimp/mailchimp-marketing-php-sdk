<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A summary of List's locations.
 */
class ListLocationsListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListLocationsListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListLocationsListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $listId The unique id for the list.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?array<ListLocationsListsResponseLocationsItem> $locations An array of objects, each representing a list's top subscriber locations.
     */
    #[JsonProperty('locations'), ArrayType([ListLocationsListsResponseLocationsItem::class])]
    public ?array $locations;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListLocationsListsResponseLinksItem>,
     *   listId?: ?string,
     *   locations?: ?array<ListLocationsListsResponseLocationsItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->locations = $values['locations'] ?? null;
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
