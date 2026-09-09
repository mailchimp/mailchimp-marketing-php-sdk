<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * An object describing the click activity for the campaign.
 */
class CampaignReportClicks extends JsonSerializableType
{
    /**
     * @var ?float $clickRate The number of unique clicks divided by the total number of successful deliveries.
     */
    #[JsonProperty('click_rate')]
    public ?float $clickRate;

    /**
     * @var ?int $clicksTotal The total number of clicks for the campaign.
     */
    #[JsonProperty('clicks_total')]
    public ?int $clicksTotal;

    /**
     * @var ?DateTime $lastClick The date and time of the last recorded click for the campaign in ISO 8601 format.
     */
    #[JsonProperty('last_click'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastClick;

    /**
     * @var ?int $uniqueClicks The total number of unique clicks for links across a campaign.
     */
    #[JsonProperty('unique_clicks')]
    public ?int $uniqueClicks;

    /**
     * @var ?int $uniqueSubscriberClicks The total number of subscribers who clicked on a campaign.
     */
    #[JsonProperty('unique_subscriber_clicks')]
    public ?int $uniqueSubscriberClicks;

    /**
     * @param array{
     *   clickRate?: ?float,
     *   clicksTotal?: ?int,
     *   lastClick?: ?DateTime,
     *   uniqueClicks?: ?int,
     *   uniqueSubscriberClicks?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clickRate = $values['clickRate'] ?? null;
        $this->clicksTotal = $values['clicksTotal'] ?? null;
        $this->lastClick = $values['lastClick'] ?? null;
        $this->uniqueClicks = $values['uniqueClicks'] ?? null;
        $this->uniqueSubscriberClicks = $values['uniqueSubscriberClicks'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
