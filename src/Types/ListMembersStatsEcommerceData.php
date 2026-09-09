<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Ecommerce stats for the list member if the list is attached to a store.
 */
class ListMembersStatsEcommerceData extends JsonSerializableType
{
    /**
     * @var ?string $currencyCode The three-letter ISO 4217 code for the currency that the store accepts.
     */
    #[JsonProperty('currency_code')]
    public ?string $currencyCode;

    /**
     * @var ?float $numberOfOrders The total number of orders placed by the list member.
     */
    #[JsonProperty('number_of_orders')]
    public ?float $numberOfOrders;

    /**
     * @var ?float $totalRevenue The total revenue the list member has brought in.
     */
    #[JsonProperty('total_revenue')]
    public ?float $totalRevenue;

    /**
     * @param array{
     *   currencyCode?: ?string,
     *   numberOfOrders?: ?float,
     *   totalRevenue?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currencyCode = $values['currencyCode'] ?? null;
        $this->numberOfOrders = $values['numberOfOrders'] ?? null;
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
