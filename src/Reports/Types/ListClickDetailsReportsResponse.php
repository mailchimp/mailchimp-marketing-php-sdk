<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ClickDetailReport;

/**
 * A list of URLs and unique IDs included in HTML and plain-text versions of a campaign.
 */
class ListClickDetailsReportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListClickDetailsReportsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListClickDetailsReportsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The campaign id.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @var ?array<ClickDetailReport> $urlsClicked An array of objects, each representing a specific URL contained in the campaign.
     */
    #[JsonProperty('urls_clicked'), ArrayType([ClickDetailReport::class])]
    public ?array $urlsClicked;

    /**
     * @param array{
     *   links?: ?array<ListClickDetailsReportsResponseLinksItem>,
     *   campaignId?: ?string,
     *   totalItems?: ?int,
     *   urlsClicked?: ?array<ClickDetailReport>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
        $this->urlsClicked = $values['urlsClicked'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
