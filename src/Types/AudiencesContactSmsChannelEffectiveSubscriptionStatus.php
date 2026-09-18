<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * A computation performed by the Mailchimp platform, triggered whenever any of its inputs change. Some inputs are controlled by API users, while others are tracked internally by the platform. Computation is based on: audience opt-in configuration (single vs. double opt-in), marketing consent status, and deliverability status (an internal state for a contact, maintained by Mailchimp for a specific marketing channel instance). This new API field is distinct from how contacts are displayed in the UI. See the [Audiences (BETA) documentation](https://mailchimp.com/developer/marketing/docs/audiences-introduction) to learn about supported values.
 */
class AudiencesContactSmsChannelEffectiveSubscriptionStatus extends JsonSerializableType
{
    /**
     * @var ?value-of<AudiencesContactSmsChannelEffectiveSubscriptionStatusValue> $value
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   value?: ?value-of<AudiencesContactSmsChannelEffectiveSubscriptionStatusValue>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
