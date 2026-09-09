<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The schedule for sending the RSS Campaign.
 */
class CampaignRssOptsSchedule extends JsonSerializableType
{
    /**
     * @var ?CampaignRssOptsScheduleDailySend $dailySend The days of the week to send a daily RSS Campaign.
     */
    #[JsonProperty('daily_send')]
    public ?CampaignRssOptsScheduleDailySend $dailySend;

    /**
     * @var ?int $hour The hour to send the campaign in local time. Acceptable hours are 0-23. For example, '4' would be 4am in [your account's default time zone](https://mailchimp.com/help/set-account-details/).
     */
    #[JsonProperty('hour')]
    public ?int $hour;

    /**
     * @var ?float $monthlySendDate The day of the month to send a monthly RSS Campaign. Acceptable days are 0-31, where '0' is always the last day of a month. Months with fewer than the selected number of days will not have an RSS campaign sent out that day. For example, RSS Campaigns set to send on the 30th will not go out in February.
     */
    #[JsonProperty('monthly_send_date')]
    public ?float $monthlySendDate;

    /**
     * @var ?value-of<CampaignRssOptsScheduleWeeklySendDay> $weeklySendDay The day of the week to send a weekly RSS Campaign.
     */
    #[JsonProperty('weekly_send_day')]
    public ?string $weeklySendDay;

    /**
     * @param array{
     *   dailySend?: ?CampaignRssOptsScheduleDailySend,
     *   hour?: ?int,
     *   monthlySendDate?: ?float,
     *   weeklySendDay?: ?value-of<CampaignRssOptsScheduleWeeklySendDay>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dailySend = $values['dailySend'] ?? null;
        $this->hour = $values['hour'] ?? null;
        $this->monthlySendDate = $values['monthlySendDate'] ?? null;
        $this->weeklySendDay = $values['weeklySendDay'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
