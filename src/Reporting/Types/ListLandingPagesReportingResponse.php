<?php

namespace Mailchimp\Reporting\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\LandingPageReport;

/**
 * A collection of landing pages.
 */
class ListLandingPagesReportingResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListLandingPagesReportingResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListLandingPagesReportingResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<LandingPageReport> $landingPages
     */
    #[JsonProperty('landing_pages'), ArrayType([LandingPageReport::class])]
    public ?array $landingPages;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListLandingPagesReportingResponseLinksItem>,
     *   landingPages?: ?array<LandingPageReport>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->landingPages = $values['landingPages'] ?? null;
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
