<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class AudiencesContactEmailChannel extends JsonSerializableType
{
    /**
     * @var ?AudiencesContactEmailChannelEffectiveSubscriptionStatus $effectiveSubscriptionStatus A computation performed by the Mailchimp platform, triggered whenever any of its inputs change. Some inputs are controlled by API users, while others are tracked internally by the platform. Computation is based on: audience opt-in configuration (single vs. double opt-in), marketing consent status, and deliverability status (an internal state for a contact, maintained by Mailchimp for a specific marketing channel instance). This new API field is distinct from how contacts are displayed in the UI. See the [Audiences (BETA) documentation](https://mailchimp.com/developer/marketing/docs/audiences-introduction) to learn about supported values.
     */
    #[JsonProperty('effective_subscription_status')]
    public ?AudiencesContactEmailChannelEffectiveSubscriptionStatus $effectiveSubscriptionStatus;

    /**
     * @var ?string $email Email address
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $hashedEmail MD5 hash of the email address
     */
    #[JsonProperty('hashed_email')]
    public ?string $hashedEmail;

    /**
     * @var ?AudiencesContactEmailChannelMarketingConsent $marketingConsent A contact's current consent status for email marketing communications. See the [Audiences (BETA) documentation](https://mailchimp.com/developer/marketing/docs/audiences-introduction) to learn about supported values.
     */
    #[JsonProperty('marketing_consent')]
    public ?AudiencesContactEmailChannelMarketingConsent $marketingConsent;

    /**
     * @var ?AudiencesContactEmailChannelSource $source The source from which the parent's entity was created.
     */
    #[JsonProperty('source')]
    public ?AudiencesContactEmailChannelSource $source;

    /**
     * @param array{
     *   effectiveSubscriptionStatus?: ?AudiencesContactEmailChannelEffectiveSubscriptionStatus,
     *   email?: ?string,
     *   hashedEmail?: ?string,
     *   marketingConsent?: ?AudiencesContactEmailChannelMarketingConsent,
     *   source?: ?AudiencesContactEmailChannelSource,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->effectiveSubscriptionStatus = $values['effectiveSubscriptionStatus'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->hashedEmail = $values['hashedEmail'] ?? null;
        $this->marketingConsent = $values['marketingConsent'] ?? null;
        $this->source = $values['source'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
