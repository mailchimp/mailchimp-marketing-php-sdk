<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Open and click rates for this subscriber.
 */
class ListsSegmentsMembersStats extends JsonSerializableType
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
     * @param array{
     *   avgClickRate?: ?float,
     *   avgOpenRate?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->avgClickRate = $values['avgClickRate'] ?? null;
        $this->avgOpenRate = $values['avgOpenRate'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
