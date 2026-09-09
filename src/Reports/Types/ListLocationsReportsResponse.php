<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Top open locations for a specific campaign.
 */
class ListLocationsReportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListLocationsReportsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListLocationsReportsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The campaign id.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?array<ListLocationsReportsResponseLocationsItem> $locations An array of objects, each representing a top location for opens.
     */
    #[JsonProperty('locations'), ArrayType([ListLocationsReportsResponseLocationsItem::class])]
    public ?array $locations;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListLocationsReportsResponseLinksItem>,
     *   campaignId?: ?string,
     *   locations?: ?array<ListLocationsReportsResponseLocationsItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
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
