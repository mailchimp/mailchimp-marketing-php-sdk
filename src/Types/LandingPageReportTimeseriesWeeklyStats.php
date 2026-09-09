<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * The clicks and visits data from the last five weeks.
 */
class LandingPageReportTimeseriesWeeklyStats extends JsonSerializableType
{
    /**
     * @var ?array<LandingPageReportTimeseriesWeeklyStatsClicksItem> $clicks The total number of clicks in a week.
     */
    #[JsonProperty('clicks'), ArrayType([LandingPageReportTimeseriesWeeklyStatsClicksItem::class])]
    public ?array $clicks;

    /**
     * @var ?array<LandingPageReportTimeseriesWeeklyStatsUniqueVisitsItem> $uniqueVisits
     */
    #[JsonProperty('unique_visits'), ArrayType([LandingPageReportTimeseriesWeeklyStatsUniqueVisitsItem::class])]
    public ?array $uniqueVisits;

    /**
     * @var ?array<LandingPageReportTimeseriesWeeklyStatsVisitsItem> $visits The total number of visits in a week.
     */
    #[JsonProperty('visits'), ArrayType([LandingPageReportTimeseriesWeeklyStatsVisitsItem::class])]
    public ?array $visits;

    /**
     * @param array{
     *   clicks?: ?array<LandingPageReportTimeseriesWeeklyStatsClicksItem>,
     *   uniqueVisits?: ?array<LandingPageReportTimeseriesWeeklyStatsUniqueVisitsItem>,
     *   visits?: ?array<LandingPageReportTimeseriesWeeklyStatsVisitsItem>,
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
