<?php

namespace Mailchimp\Campaigns\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Choose whether the campaign should use [Batch Delivery](https://mailchimp.com/help/schedule-batch-delivery/). Cannot be set to `true` for campaigns using [Timewarp](https://mailchimp.com/help/use-timewarp/).
 */
class CreateActionScheduleCampaignsRequestBatchDelivery extends JsonSerializableType
{
    /**
     * @var int $batchCount The number of batches for the campaign send.
     */
    #[JsonProperty('batch_count')]
    public int $batchCount;

    /**
     * @var int $batchDelay The delay, in minutes, between batches.
     */
    #[JsonProperty('batch_delay')]
    public int $batchDelay;

    /**
     * @param array{
     *   batchCount: int,
     *   batchDelay: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->batchCount = $values['batchCount'];
        $this->batchDelay = $values['batchDelay'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
