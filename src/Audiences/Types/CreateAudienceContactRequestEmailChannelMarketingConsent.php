<?php

namespace Mailchimp\Audiences\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * A contact's current consent status for email marketing communications. See the [Audiences (BETA) documentation](https://mailchimp.com/developer/marketing/docs/audiences-introduction) to learn about supported values.
 */
class CreateAudienceContactRequestEmailChannelMarketingConsent extends JsonSerializableType
{
    /**
     * @var ?value-of<CreateAudienceContactRequestEmailChannelMarketingConsentStatus> $status Status of a contacts Marketing Consent
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   status?: ?value-of<CreateAudienceContactRequestEmailChannelMarketingConsentStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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
