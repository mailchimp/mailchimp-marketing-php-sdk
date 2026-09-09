<?php

namespace Mailchimp\SmsCampaigns\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use DateTime;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Date;

class CreateActionScheduleSmsCampaignsRequest extends JsonSerializableType
{
    /**
     * @var DateTime $scheduleTime The UTC date and time to schedule the campaign.
     */
    #[JsonProperty('schedule_time'), Date(Date::TYPE_DATETIME)]
    public DateTime $scheduleTime;

    /**
     * @param array{
     *   scheduleTime: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->scheduleTime = $values['scheduleTime'];
    }
}
