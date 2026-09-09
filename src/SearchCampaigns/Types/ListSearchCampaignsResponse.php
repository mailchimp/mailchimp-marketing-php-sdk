<?php

namespace Mailchimp\SearchCampaigns\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Campaigns and Snippets found for given search term.
 */
class ListSearchCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListSearchCampaignsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListSearchCampaignsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListSearchCampaignsResponseResultsItem> $results An array of matching campaigns and snippets.
     */
    #[JsonProperty('results'), ArrayType([ListSearchCampaignsResponseResultsItem::class])]
    public ?array $results;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListSearchCampaignsResponseLinksItem>,
     *   results?: ?array<ListSearchCampaignsResponseResultsItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->results = $values['results'] ?? null;
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
