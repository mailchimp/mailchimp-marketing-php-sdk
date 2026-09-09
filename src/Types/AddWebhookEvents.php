<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The events that can trigger the webhook and whether they are enabled.
 */
class AddWebhookEvents extends JsonSerializableType
{
    /**
     * @var ?bool $campaign Whether the webhook is triggered when a campaign is sent or cancelled.
     */
    #[JsonProperty('campaign')]
    public ?bool $campaign;

    /**
     * @var ?bool $cleaned Whether the webhook is triggered when a subscriber's email address is cleaned from the list.
     */
    #[JsonProperty('cleaned')]
    public ?bool $cleaned;

    /**
     * @var ?bool $profile Whether the webhook is triggered when a contact's profile is updated. This includes email subscribers and SMS-only contacts [BETA].
     */
    #[JsonProperty('profile')]
    public ?bool $profile;

    /**
     * @var ?bool $subscribe Whether the webhook is triggered when a list subscriber is added.
     */
    #[JsonProperty('subscribe')]
    public ?bool $subscribe;

    /**
     * @var ?bool $unsubscribe Whether the webhook is triggered when a list member unsubscribes.
     */
    #[JsonProperty('unsubscribe')]
    public ?bool $unsubscribe;

    /**
     * @var ?bool $upemail Whether the webhook is triggered when a subscriber's email address is changed.
     */
    #[JsonProperty('upemail')]
    public ?bool $upemail;

    /**
     * @var ?bool $smsSubscribe [BETA] Whether the webhook is triggered when a contact subscribes to SMS.
     */
    #[JsonProperty('sms_subscribe')]
    public ?bool $smsSubscribe;

    /**
     * @var ?bool $smsUnsubscribe [BETA] Whether the webhook is triggered when a contact unsubscribes from SMS.
     */
    #[JsonProperty('sms_unsubscribe')]
    public ?bool $smsUnsubscribe;

    /**
     * @var ?bool $upsms [BETA] Whether the webhook is triggered when a contact's SMS phone number is updated.
     */
    #[JsonProperty('upsms')]
    public ?bool $upsms;

    /**
     * @var ?bool $smsCampaign [BETA] Whether the webhook is triggered when an SMS campaign is sent.
     */
    #[JsonProperty('sms_campaign')]
    public ?bool $smsCampaign;

    /**
     * @param array{
     *   campaign?: ?bool,
     *   cleaned?: ?bool,
     *   profile?: ?bool,
     *   subscribe?: ?bool,
     *   unsubscribe?: ?bool,
     *   upemail?: ?bool,
     *   smsSubscribe?: ?bool,
     *   smsUnsubscribe?: ?bool,
     *   upsms?: ?bool,
     *   smsCampaign?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaign = $values['campaign'] ?? null;
        $this->cleaned = $values['cleaned'] ?? null;
        $this->profile = $values['profile'] ?? null;
        $this->subscribe = $values['subscribe'] ?? null;
        $this->unsubscribe = $values['unsubscribe'] ?? null;
        $this->upemail = $values['upemail'] ?? null;
        $this->smsSubscribe = $values['smsSubscribe'] ?? null;
        $this->smsUnsubscribe = $values['smsUnsubscribe'] ?? null;
        $this->upsms = $values['upsms'] ?? null;
        $this->smsCampaign = $values['smsCampaign'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
