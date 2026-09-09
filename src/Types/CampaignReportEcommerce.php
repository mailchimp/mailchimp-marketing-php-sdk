<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * E-Commerce stats for a campaign.
 */
class CampaignReportEcommerce extends JsonSerializableType
{
    /**
     * @var ?string $currencyCode
     */
    #[JsonProperty('currency_code')]
    public ?string $currencyCode;

    /**
     * @var ?int $totalOrders The total orders for a campaign.
     */
    #[JsonProperty('total_orders')]
    public ?int $totalOrders;

    /**
     * @var ?float $totalRevenue The total revenue for a campaign. Calculated as the sum of all order totals minus shipping and tax totals.
     */
    #[JsonProperty('total_revenue')]
    public ?float $totalRevenue;

    /**
     * @var ?float $totalSpent The total spent for a campaign. Calculated as the sum of all order totals with no deductions.
     */
    #[JsonProperty('total_spent')]
    public ?float $totalSpent;

    /**
     * @param array{
     *   currencyCode?: ?string,
     *   totalOrders?: ?int,
     *   totalRevenue?: ?float,
     *   totalSpent?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currencyCode = $values['currencyCode'] ?? null;
        $this->totalOrders = $values['totalOrders'] ?? null;
        $this->totalRevenue = $values['totalRevenue'] ?? null;
        $this->totalSpent = $values['totalSpent'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
