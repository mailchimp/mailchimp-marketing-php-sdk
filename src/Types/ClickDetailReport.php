<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A report of links clicked in a specific campaign.
 */
class ClickDetailReport extends JsonSerializableType
{
    /**
     * @var ?array<ClickDetailReportLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ClickDetailReportLinksItem::class])]
    public ?array $links;

    /**
     * @var ?ClickDetailReportAbSplit $abSplit A breakdown of clicks by different groups of an A/B Split campaign. Does not return information about Multivariate Campaigns.
     */
    #[JsonProperty('ab_split')]
    public ?ClickDetailReportAbSplit $abSplit;

    /**
     * @var ?string $campaignId The campaign id.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?float $clickPercentage The percentage of total clicks a link generated for a campaign.
     */
    #[JsonProperty('click_percentage')]
    public ?float $clickPercentage;

    /**
     * @var ?string $id The unique id for the link.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $lastClick The date and time for the last recorded click for a link in ISO 8601 format.
     */
    #[JsonProperty('last_click'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastClick;

    /**
     * @var ?int $totalClicks The number of total clicks for a link.
     */
    #[JsonProperty('total_clicks')]
    public ?int $totalClicks;

    /**
     * @var ?float $uniqueClickPercentage The percentage of unique clicks a link generated for a campaign.
     */
    #[JsonProperty('unique_click_percentage')]
    public ?float $uniqueClickPercentage;

    /**
     * @var ?int $uniqueClicks Number of unique clicks for a link.
     */
    #[JsonProperty('unique_clicks')]
    public ?int $uniqueClicks;

    /**
     * @var ?string $url The URL for the link in the campaign.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   links?: ?array<ClickDetailReportLinksItem>,
     *   abSplit?: ?ClickDetailReportAbSplit,
     *   campaignId?: ?string,
     *   clickPercentage?: ?float,
     *   id?: ?string,
     *   lastClick?: ?DateTime,
     *   totalClicks?: ?int,
     *   uniqueClickPercentage?: ?float,
     *   uniqueClicks?: ?int,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->abSplit = $values['abSplit'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->clickPercentage = $values['clickPercentage'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lastClick = $values['lastClick'] ?? null;
        $this->totalClicks = $values['totalClicks'] ?? null;
        $this->uniqueClickPercentage = $values['uniqueClickPercentage'] ?? null;
        $this->uniqueClicks = $values['uniqueClicks'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
