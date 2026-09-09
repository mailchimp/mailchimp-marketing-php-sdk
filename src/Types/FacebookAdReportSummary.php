<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * High level reporting stats for an outreach.
 */
class FacebookAdReportSummary extends JsonSerializableType
{
    /**
     * @var ?float $clickRate
     */
    #[JsonProperty('click_rate')]
    public ?float $clickRate;

    /**
     * @var ?int $clicks
     */
    #[JsonProperty('clicks')]
    public ?int $clicks;

    /**
     * @var ?float $conversionRate
     */
    #[JsonProperty('conversion_rate')]
    public ?float $conversionRate;

    /**
     * @var ?FacebookAdReportSummaryEcommerce $ecommerce
     */
    #[JsonProperty('ecommerce')]
    public ?FacebookAdReportSummaryEcommerce $ecommerce;

    /**
     * @var ?int $engagements
     */
    #[JsonProperty('engagements')]
    public ?int $engagements;

    /**
     * @var ?float $impressions
     */
    #[JsonProperty('impressions')]
    public ?float $impressions;

    /**
     * @var ?float $openRate
     */
    #[JsonProperty('open_rate')]
    public ?float $openRate;

    /**
     * @var ?int $opens
     */
    #[JsonProperty('opens')]
    public ?int $opens;

    /**
     * @var ?float $proxyExcludedOpenRate
     */
    #[JsonProperty('proxy_excluded_open_rate')]
    public ?float $proxyExcludedOpenRate;

    /**
     * @var ?int $proxyExcludedOpens
     */
    #[JsonProperty('proxy_excluded_opens')]
    public ?int $proxyExcludedOpens;

    /**
     * @var ?int $proxyExcludedUniqueOpens
     */
    #[JsonProperty('proxy_excluded_unique_opens')]
    public ?int $proxyExcludedUniqueOpens;

    /**
     * @var ?int $reach
     */
    #[JsonProperty('reach')]
    public ?int $reach;

    /**
     * @var ?int $subscriberClicks
     */
    #[JsonProperty('subscriber_clicks')]
    public ?int $subscriberClicks;

    /**
     * @var ?int $subscribes
     */
    #[JsonProperty('subscribes')]
    public ?int $subscribes;

    /**
     * @var ?int $totalSent
     */
    #[JsonProperty('total_sent')]
    public ?int $totalSent;

    /**
     * @var ?int $uniqueOpens
     */
    #[JsonProperty('unique_opens')]
    public ?int $uniqueOpens;

    /**
     * @var ?int $uniqueVisits
     */
    #[JsonProperty('unique_visits')]
    public ?int $uniqueVisits;

    /**
     * @var ?int $visits
     */
    #[JsonProperty('visits')]
    public ?int $visits;

    /**
     * @param array{
     *   clickRate?: ?float,
     *   clicks?: ?int,
     *   conversionRate?: ?float,
     *   ecommerce?: ?FacebookAdReportSummaryEcommerce,
     *   engagements?: ?int,
     *   impressions?: ?float,
     *   openRate?: ?float,
     *   opens?: ?int,
     *   proxyExcludedOpenRate?: ?float,
     *   proxyExcludedOpens?: ?int,
     *   proxyExcludedUniqueOpens?: ?int,
     *   reach?: ?int,
     *   subscriberClicks?: ?int,
     *   subscribes?: ?int,
     *   totalSent?: ?int,
     *   uniqueOpens?: ?int,
     *   uniqueVisits?: ?int,
     *   visits?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clickRate = $values['clickRate'] ?? null;
        $this->clicks = $values['clicks'] ?? null;
        $this->conversionRate = $values['conversionRate'] ?? null;
        $this->ecommerce = $values['ecommerce'] ?? null;
        $this->engagements = $values['engagements'] ?? null;
        $this->impressions = $values['impressions'] ?? null;
        $this->openRate = $values['openRate'] ?? null;
        $this->opens = $values['opens'] ?? null;
        $this->proxyExcludedOpenRate = $values['proxyExcludedOpenRate'] ?? null;
        $this->proxyExcludedOpens = $values['proxyExcludedOpens'] ?? null;
        $this->proxyExcludedUniqueOpens = $values['proxyExcludedUniqueOpens'] ?? null;
        $this->reach = $values['reach'] ?? null;
        $this->subscriberClicks = $values['subscriberClicks'] ?? null;
        $this->subscribes = $values['subscribes'] ?? null;
        $this->totalSent = $values['totalSent'] ?? null;
        $this->uniqueOpens = $values['uniqueOpens'] ?? null;
        $this->uniqueVisits = $values['uniqueVisits'] ?? null;
        $this->visits = $values['visits'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
