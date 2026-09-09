<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class LandingPageReportTimeseriesDailyStatsUniqueVisitsItem extends JsonSerializableType
{
    /**
     * @var ?string $date
     */
    #[JsonProperty('date')]
    public ?string $date;

    /**
     * @var ?int $val
     */
    #[JsonProperty('val')]
    public ?int $val;

    /**
     * @param array{
     *   date?: ?string,
     *   val?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->date = $values['date'] ?? null;
        $this->val = $values['val'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
