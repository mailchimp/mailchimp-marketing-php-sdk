<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class LandingPageReportTimeseries extends JsonSerializableType
{
    /**
     * @var ?LandingPageReportTimeseriesDailyStats $dailyStats The clicks and visits data from the last seven days.
     */
    #[JsonProperty('daily_stats')]
    public ?LandingPageReportTimeseriesDailyStats $dailyStats;

    /**
     * @var ?LandingPageReportTimeseriesWeeklyStats $weeklyStats The clicks and visits data from the last five weeks.
     */
    #[JsonProperty('weekly_stats')]
    public ?LandingPageReportTimeseriesWeeklyStats $weeklyStats;

    /**
     * @param array{
     *   dailyStats?: ?LandingPageReportTimeseriesDailyStats,
     *   weeklyStats?: ?LandingPageReportTimeseriesWeeklyStats,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dailyStats = $values['dailyStats'] ?? null;
        $this->weeklyStats = $values['weeklyStats'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
