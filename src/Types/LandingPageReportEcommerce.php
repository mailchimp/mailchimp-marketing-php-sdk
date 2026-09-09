<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class LandingPageReportEcommerce extends JsonSerializableType
{
    /**
     * @var ?float $averageOrderRevenue The average order revenue of this landing page.
     */
    #[JsonProperty('average_order_revenue')]
    public ?float $averageOrderRevenue;

    /**
     * @var ?string $currencyCode The user's currency code.
     */
    #[JsonProperty('currency_code')]
    public ?string $currencyCode;

    /**
     * @var ?int $totalOrders The total number of orders associated with this landing page.
     */
    #[JsonProperty('total_orders')]
    public ?int $totalOrders;

    /**
     * @var ?float $totalRevenue The total revenue of this landing page.
     */
    #[JsonProperty('total_revenue')]
    public ?float $totalRevenue;

    /**
     * @param array{
     *   averageOrderRevenue?: ?float,
     *   currencyCode?: ?string,
     *   totalOrders?: ?int,
     *   totalRevenue?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->averageOrderRevenue = $values['averageOrderRevenue'] ?? null;
        $this->currencyCode = $values['currencyCode'] ?? null;
        $this->totalOrders = $values['totalOrders'] ?? null;
        $this->totalRevenue = $values['totalRevenue'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
