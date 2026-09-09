<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * For sent campaigns, a summary of opens and clicks.
 */
class CampaignReportSummary extends JsonSerializableType
{
    /**
     * @var ?float $clickRate The number of unique clicks divided by the total number of successful deliveries.
     */
    #[JsonProperty('click_rate')]
    public ?float $clickRate;

    /**
     * @var ?int $clicks The total number of clicks for an campaign.
     */
    #[JsonProperty('clicks')]
    public ?int $clicks;

    /**
     * @var ?CampaignReportSummaryEcommerce $ecommerce E-Commerce stats for a campaign.
     */
    #[JsonProperty('ecommerce')]
    public ?CampaignReportSummaryEcommerce $ecommerce;

    /**
     * @var ?float $openRate The number of unique opens divided by the total number of successful deliveries.
     */
    #[JsonProperty('open_rate')]
    public ?float $openRate;

    /**
     * @var ?int $opens The total number of opens for a campaign.
     */
    #[JsonProperty('opens')]
    public ?int $opens;

    /**
     * @var ?int $subscriberClicks The number of unique clicks.
     */
    #[JsonProperty('subscriber_clicks')]
    public ?int $subscriberClicks;

    /**
     * @var ?int $uniqueOpens The number of unique opens.
     */
    #[JsonProperty('unique_opens')]
    public ?int $uniqueOpens;

    /**
     * @param array{
     *   clickRate?: ?float,
     *   clicks?: ?int,
     *   ecommerce?: ?CampaignReportSummaryEcommerce,
     *   openRate?: ?float,
     *   opens?: ?int,
     *   subscriberClicks?: ?int,
     *   uniqueOpens?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clickRate = $values['clickRate'] ?? null;
        $this->clicks = $values['clicks'] ?? null;
        $this->ecommerce = $values['ecommerce'] ?? null;
        $this->openRate = $values['openRate'] ?? null;
        $this->opens = $values['opens'] ?? null;
        $this->subscriberClicks = $values['subscriberClicks'] ?? null;
        $this->uniqueOpens = $values['uniqueOpens'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
