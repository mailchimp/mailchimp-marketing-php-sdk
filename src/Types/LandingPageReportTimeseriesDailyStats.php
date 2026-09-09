<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * The clicks and visits data from the last seven days.
 */
class LandingPageReportTimeseriesDailyStats extends JsonSerializableType
{
    /**
     * @var ?array<LandingPageReportTimeseriesDailyStatsClicksItem> $clicks
     */
    #[JsonProperty('clicks'), ArrayType([LandingPageReportTimeseriesDailyStatsClicksItem::class])]
    public ?array $clicks;

    /**
     * @var ?array<LandingPageReportTimeseriesDailyStatsUniqueVisitsItem> $uniqueVisits
     */
    #[JsonProperty('unique_visits'), ArrayType([LandingPageReportTimeseriesDailyStatsUniqueVisitsItem::class])]
    public ?array $uniqueVisits;

    /**
     * @var ?array<LandingPageReportTimeseriesDailyStatsVisitsItem> $visits
     */
    #[JsonProperty('visits'), ArrayType([LandingPageReportTimeseriesDailyStatsVisitsItem::class])]
    public ?array $visits;

    /**
     * @param array{
     *   clicks?: ?array<LandingPageReportTimeseriesDailyStatsClicksItem>,
     *   uniqueVisits?: ?array<LandingPageReportTimeseriesDailyStatsUniqueVisitsItem>,
     *   visits?: ?array<LandingPageReportTimeseriesDailyStatsVisitsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clicks = $values['clicks'] ?? null;
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
