<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Stats for Group A.
 */
class ClickDetailReportAbSplitA extends JsonSerializableType
{
    /**
     * @var ?float $clickPercentageA The percentage of total clicks for Group A.
     */
    #[JsonProperty('click_percentage_a')]
    public ?float $clickPercentageA;

    /**
     * @var ?int $totalClicksA The total number of clicks for Group A.
     */
    #[JsonProperty('total_clicks_a')]
    public ?int $totalClicksA;

    /**
     * @var ?float $uniqueClickPercentageA The percentage of unique clicks for Group A.
     */
    #[JsonProperty('unique_click_percentage_a')]
    public ?float $uniqueClickPercentageA;

    /**
     * @var ?int $uniqueClicksA The number of unique clicks for Group A.
     */
    #[JsonProperty('unique_clicks_a')]
    public ?int $uniqueClicksA;

    /**
     * @param array{
     *   clickPercentageA?: ?float,
     *   totalClicksA?: ?int,
     *   uniqueClickPercentageA?: ?float,
     *   uniqueClicksA?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clickPercentageA = $values['clickPercentageA'] ?? null;
        $this->totalClicksA = $values['totalClicksA'] ?? null;
        $this->uniqueClickPercentageA = $values['uniqueClickPercentageA'] ?? null;
        $this->uniqueClicksA = $values['uniqueClicksA'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
