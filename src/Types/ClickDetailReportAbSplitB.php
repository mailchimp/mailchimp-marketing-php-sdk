<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Stats for Group B.
 */
class ClickDetailReportAbSplitB extends JsonSerializableType
{
    /**
     * @var ?float $clickPercentageB The percentage of total clicks for Group B.
     */
    #[JsonProperty('click_percentage_b')]
    public ?float $clickPercentageB;

    /**
     * @var ?int $totalClicksB The total number of clicks for Group B.
     */
    #[JsonProperty('total_clicks_b')]
    public ?int $totalClicksB;

    /**
     * @var ?float $uniqueClickPercentageB The percentage of unique clicks for Group B.
     */
    #[JsonProperty('unique_click_percentage_b')]
    public ?float $uniqueClickPercentageB;

    /**
     * @var ?int $uniqueClicksB The number of unique clicks for Group B.
     */
    #[JsonProperty('unique_clicks_b')]
    public ?int $uniqueClicksB;

    /**
     * @param array{
     *   clickPercentageB?: ?float,
     *   totalClicksB?: ?int,
     *   uniqueClickPercentageB?: ?float,
     *   uniqueClicksB?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clickPercentageB = $values['clickPercentageB'] ?? null;
        $this->totalClicksB = $values['totalClicksB'] ?? null;
        $this->uniqueClickPercentageB = $values['uniqueClickPercentageB'] ?? null;
        $this->uniqueClicksB = $values['uniqueClicksB'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
