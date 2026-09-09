<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Report summary of facebook ad
 */
class ReportingFacebookAdReportSummary extends JsonSerializableType
{
    /**
     * @var ?ReportingFacebookAdReportSummaryAverageDailyBudget $averageDailyBudget
     */
    #[JsonProperty('average_daily_budget')]
    public ?ReportingFacebookAdReportSummaryAverageDailyBudget $averageDailyBudget;

    /**
     * @var ?ReportingFacebookAdReportSummaryAverageOrderAmount $averageOrderAmount
     */
    #[JsonProperty('average_order_amount')]
    public ?ReportingFacebookAdReportSummaryAverageOrderAmount $averageOrderAmount;

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
     * @var ?int $comments
     */
    #[JsonProperty('comments')]
    public ?int $comments;

    /**
     * @var ?ReportingFacebookAdReportSummaryCostPerClick $costPerClick
     */
    #[JsonProperty('cost_per_click')]
    public ?ReportingFacebookAdReportSummaryCostPerClick $costPerClick;

    /**
     * @var ?ReportingFacebookAdReportSummaryEcommerce $ecommerce
     */
    #[JsonProperty('ecommerce')]
    public ?ReportingFacebookAdReportSummaryEcommerce $ecommerce;

    /**
     * @var ?ReportingFacebookAdReportSummaryExtendedAt $extendedAt
     */
    #[JsonProperty('extended_at')]
    public ?ReportingFacebookAdReportSummaryExtendedAt $extendedAt;

    /**
     * @var ?int $firstTimeBuyers
     */
    #[JsonProperty('first_time_buyers')]
    public ?int $firstTimeBuyers;

    /**
     * @var ?bool $hasExtendedAdDuration
     */
    #[JsonProperty('has_extended_ad_duration')]
    public ?bool $hasExtendedAdDuration;

    /**
     * @var ?int $impressions
     */
    #[JsonProperty('impressions')]
    public ?int $impressions;

    /**
     * @var ?int $likes
     */
    #[JsonProperty('likes')]
    public ?int $likes;

    /**
     * @var ?int $reach
     */
    #[JsonProperty('reach')]
    public ?int $reach;

    /**
     * @var ?float $returnOnInvestment
     */
    #[JsonProperty('return_on_investment')]
    public ?float $returnOnInvestment;

    /**
     * @var ?int $shares
     */
    #[JsonProperty('shares')]
    public ?int $shares;

    /**
     * @var ?int $totalOrders
     */
    #[JsonProperty('total_orders')]
    public ?int $totalOrders;

    /**
     * @var ?int $totalProductsSold
     */
    #[JsonProperty('total_products_sold')]
    public ?int $totalProductsSold;

    /**
     * @var ?int $uniqueClicks
     */
    #[JsonProperty('unique_clicks')]
    public ?int $uniqueClicks;

    /**
     * @param array{
     *   averageDailyBudget?: ?ReportingFacebookAdReportSummaryAverageDailyBudget,
     *   averageOrderAmount?: ?ReportingFacebookAdReportSummaryAverageOrderAmount,
     *   clickRate?: ?float,
     *   clicks?: ?int,
     *   comments?: ?int,
     *   costPerClick?: ?ReportingFacebookAdReportSummaryCostPerClick,
     *   ecommerce?: ?ReportingFacebookAdReportSummaryEcommerce,
     *   extendedAt?: ?ReportingFacebookAdReportSummaryExtendedAt,
     *   firstTimeBuyers?: ?int,
     *   hasExtendedAdDuration?: ?bool,
     *   impressions?: ?int,
     *   likes?: ?int,
     *   reach?: ?int,
     *   returnOnInvestment?: ?float,
     *   shares?: ?int,
     *   totalOrders?: ?int,
     *   totalProductsSold?: ?int,
     *   uniqueClicks?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->averageDailyBudget = $values['averageDailyBudget'] ?? null;
        $this->averageOrderAmount = $values['averageOrderAmount'] ?? null;
        $this->clickRate = $values['clickRate'] ?? null;
        $this->clicks = $values['clicks'] ?? null;
        $this->comments = $values['comments'] ?? null;
        $this->costPerClick = $values['costPerClick'] ?? null;
        $this->ecommerce = $values['ecommerce'] ?? null;
        $this->extendedAt = $values['extendedAt'] ?? null;
        $this->firstTimeBuyers = $values['firstTimeBuyers'] ?? null;
        $this->hasExtendedAdDuration = $values['hasExtendedAdDuration'] ?? null;
        $this->impressions = $values['impressions'] ?? null;
        $this->likes = $values['likes'] ?? null;
        $this->reach = $values['reach'] ?? null;
        $this->returnOnInvestment = $values['returnOnInvestment'] ?? null;
        $this->shares = $values['shares'] ?? null;
        $this->totalOrders = $values['totalOrders'] ?? null;
        $this->totalProductsSold = $values['totalProductsSold'] ?? null;
        $this->uniqueClicks = $values['uniqueClicks'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
