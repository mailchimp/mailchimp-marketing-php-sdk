<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Open and click rates for this subscriber.
 */
class ListMembersStats extends JsonSerializableType
{
    /**
     * @var ?float $avgClickRate A subscriber's average clickthrough rate.
     */
    #[JsonProperty('avg_click_rate')]
    public ?float $avgClickRate;

    /**
     * @var ?float $avgOpenRate A subscriber's average open rate.
     */
    #[JsonProperty('avg_open_rate')]
    public ?float $avgOpenRate;

    /**
     * @var ?ListMembersStatsEcommerceData $ecommerceData Ecommerce stats for the list member if the list is attached to a store.
     */
    #[JsonProperty('ecommerce_data')]
    public ?ListMembersStatsEcommerceData $ecommerceData;

    /**
     * @param array{
     *   avgClickRate?: ?float,
     *   avgOpenRate?: ?float,
     *   ecommerceData?: ?ListMembersStatsEcommerceData,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->avgClickRate = $values['avgClickRate'] ?? null;
        $this->avgOpenRate = $values['avgOpenRate'] ?? null;
        $this->ecommerceData = $values['ecommerceData'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
