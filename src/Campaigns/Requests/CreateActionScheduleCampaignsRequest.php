<?php

namespace Mailchimp\Campaigns\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Campaigns\Types\CreateActionScheduleCampaignsRequestBatchDelivery;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

class CreateActionScheduleCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?CreateActionScheduleCampaignsRequestBatchDelivery $batchDelivery Choose whether the campaign should use [Batch Delivery](https://mailchimp.com/help/schedule-batch-delivery/). Cannot be set to `true` for campaigns using [Timewarp](https://mailchimp.com/help/use-timewarp/).
     */
    #[JsonProperty('batch_delivery')]
    public ?CreateActionScheduleCampaignsRequestBatchDelivery $batchDelivery;

    /**
     * @var DateTime $scheduleTime The UTC date and time to schedule the campaign for delivery in ISO 8601 format. Campaigns may only be scheduled to send on the quarter-hour (:00, :15, :30, :45).
     */
    #[JsonProperty('schedule_time'), Date(Date::TYPE_DATETIME)]
    public DateTime $scheduleTime;

    /**
     * @var ?bool $timewarp Choose whether the campaign should use [Timewarp](https://mailchimp.com/help/use-timewarp/) when sending. Campaigns scheduled with Timewarp are localized based on the recipients' time zones. For example, a Timewarp campaign with a `schedule_time` of 13:00 will be sent to each recipient at 1:00pm in their local time. Cannot be set to `true` for campaigns using [Batch Delivery](https://mailchimp.com/help/schedule-batch-delivery/).
     */
    #[JsonProperty('timewarp')]
    public ?bool $timewarp;

    /**
     * @param array{
     *   scheduleTime: DateTime,
     *   batchDelivery?: ?CreateActionScheduleCampaignsRequestBatchDelivery,
     *   timewarp?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->batchDelivery = $values['batchDelivery'] ?? null;
        $this->scheduleTime = $values['scheduleTime'];
        $this->timewarp = $values['timewarp'] ?? null;
    }
}
