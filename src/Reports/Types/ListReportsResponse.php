<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\CampaignReport;

/**
 * A list of reports containing campaigns marked as Sent.
 */
class ListReportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListReportsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListReportsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<CampaignReport> $reports An array of objects, each representing a report resource.
     */
    #[JsonProperty('reports'), ArrayType([CampaignReport::class])]
    public ?array $reports;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListReportsResponseLinksItem>,
     *   reports?: ?array<CampaignReport>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->reports = $values['reports'] ?? null;
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
