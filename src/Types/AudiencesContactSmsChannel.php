<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class AudiencesContactSmsChannel extends JsonSerializableType
{
    /**
     * @var ?AudiencesContactSmsChannelEffectiveSubscriptionStatus $effectiveSubscriptionStatus A computation performed by the Mailchimp platform, triggered whenever any of its inputs change. Some inputs are controlled by API users, while others are tracked internally by the platform. Computation is based on: audience opt-in configuration (single vs. double opt-in), marketing consent status, and deliverability status (an internal state for a contact, maintained by Mailchimp for a specific marketing channel instance). This new API field is distinct from how contacts are displayed in the UI. See the [Audiences (BETA) documentation](https://mailchimp.com/developer/marketing/docs/audiences-introduction) to learn about supported values.
     */
    #[JsonProperty('effective_subscription_status')]
    public ?AudiencesContactSmsChannelEffectiveSubscriptionStatus $effectiveSubscriptionStatus;

    /**
     * @var ?AudiencesContactSmsChannelMarketingConsent $marketingConsent A contact's current consent status for SMS marketing communications. See the [Audiences (BETA) documentation](https://mailchimp.com/developer/marketing/docs/audiences-introduction) to learn about supported values.
     */
    #[JsonProperty('marketing_consent')]
    public ?AudiencesContactSmsChannelMarketingConsent $marketingConsent;

    /**
     * @var ?string $smsPhone SMS Phone Number
     */
    #[JsonProperty('sms_phone')]
    public ?string $smsPhone;

    /**
     * @var ?AudiencesContactSmsChannelSource $source The source from which the parent's entity was created.
     */
    #[JsonProperty('source')]
    public ?AudiencesContactSmsChannelSource $source;

    /**
     * @var ?string $hashedSmsPhone SHA256 hash of the SMS phone number
     */
    #[JsonProperty('hashed_sms_phone')]
    public ?string $hashedSmsPhone;

    /**
     * @param array{
     *   effectiveSubscriptionStatus?: ?AudiencesContactSmsChannelEffectiveSubscriptionStatus,
     *   marketingConsent?: ?AudiencesContactSmsChannelMarketingConsent,
     *   smsPhone?: ?string,
     *   source?: ?AudiencesContactSmsChannelSource,
     *   hashedSmsPhone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->effectiveSubscriptionStatus = $values['effectiveSubscriptionStatus'] ?? null;
        $this->marketingConsent = $values['marketingConsent'] ?? null;
        $this->smsPhone = $values['smsPhone'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->hashedSmsPhone = $values['hashedSmsPhone'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
