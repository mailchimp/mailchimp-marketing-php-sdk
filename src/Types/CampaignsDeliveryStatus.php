<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Updates on campaigns in the process of sending.
 */
class CampaignsDeliveryStatus extends JsonSerializableType
{
    /**
     * @var ?bool $canCancel Whether a campaign send can be canceled.
     */
    #[JsonProperty('can_cancel')]
    public ?bool $canCancel;

    /**
     * @var ?int $emailsCanceled The total number of emails canceled for this campaign.
     */
    #[JsonProperty('emails_canceled')]
    public ?int $emailsCanceled;

    /**
     * @var ?int $emailsSent The total number of emails confirmed sent for this campaign so far.
     */
    #[JsonProperty('emails_sent')]
    public ?int $emailsSent;

    /**
     * @var ?bool $enabled Whether Campaign Delivery Status is enabled for this account and campaign.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?value-of<CampaignsDeliveryStatusStatus> $status The current state of a campaign delivery.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   canCancel?: ?bool,
     *   emailsCanceled?: ?int,
     *   emailsSent?: ?int,
     *   enabled?: ?bool,
     *   status?: ?value-of<CampaignsDeliveryStatusStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->canCancel = $values['canCancel'] ?? null;
        $this->emailsCanceled = $values['emailsCanceled'] ?? null;
        $this->emailsSent = $values['emailsSent'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
