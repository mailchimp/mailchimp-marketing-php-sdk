<?php

namespace Mailchimp\Audiences\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A contact's current consent status for SMS marketing communications. See the [Audiences (BETA) documentation](https://mailchimp.com/developer/marketing/docs/audiences-introduction) to learn about supported values.
 */
class PatchAudienceContactRequestSmsChannelMarketingConsent extends JsonSerializableType
{
    /**
     * @var ?PatchAudienceContactRequestSmsChannelMarketingConsentSource $source The source from which the parent's entity was created.
     */
    #[JsonProperty('source')]
    public ?PatchAudienceContactRequestSmsChannelMarketingConsentSource $source;

    /**
     * @var ?value-of<PatchAudienceContactRequestSmsChannelMarketingConsentStatus> $status The contact's SMS marketing consent status. Use `confirmed` for double opt-in audiences, `consented` for single opt-in audiences. `denied` is accepted on PATCH/PUT only (not POST) and drives an API-initiated unsubscribe; it cannot be used when creating a new contact.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?DateTime $capturedAt The timestamp when SMS marketing consent was captured (ISO 8601). Only accepted and returned when status is `confirmed`. The timestamp of the consent state change being recorded. Defaults to the current time if not provided. If the contact already has a consent timestamp on record that is equal to or newer than the supplied value, the supplied value is ignored (staleness guard); to update the consent timestamp supply a value strictly newer than the stored one.
     */
    #[JsonProperty('captured_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $capturedAt;

    /**
     * @param array{
     *   source?: ?PatchAudienceContactRequestSmsChannelMarketingConsentSource,
     *   status?: ?value-of<PatchAudienceContactRequestSmsChannelMarketingConsentStatus>,
     *   capturedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->source = $values['source'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->capturedAt = $values['capturedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
