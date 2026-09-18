<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A contact's current consent status for email marketing communications. See the [Audiences (BETA) documentation](https://mailchimp.com/developer/marketing/docs/audiences-introduction) to learn about supported values.
 */
class AudiencesContactEmailChannelMarketingConsent extends JsonSerializableType
{
    /**
     * @var ?AudiencesContactEmailChannelMarketingConsentSource $source The source from which the parent's entity was created.
     */
    #[JsonProperty('source')]
    public ?AudiencesContactEmailChannelMarketingConsentSource $source;

    /**
     * @var ?value-of<AudiencesContactEmailChannelMarketingConsentStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?DateTime $capturedAt The ISO 8601 timestamp when the email marketing consent state was recorded; accepted and returned only when status is `confirmed` or `consented`; defaults to the current time if omitted; ignored if older than an existing stored timestamp (staleness guard).
     */
    #[JsonProperty('captured_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $capturedAt;

    /**
     * @param array{
     *   source?: ?AudiencesContactEmailChannelMarketingConsentSource,
     *   status?: ?value-of<AudiencesContactEmailChannelMarketingConsentStatus>,
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
