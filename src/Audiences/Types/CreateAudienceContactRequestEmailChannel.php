<?php

namespace Mailchimp\Audiences\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateAudienceContactRequestEmailChannel extends JsonSerializableType
{
    /**
     * @var ?string $email Email address
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?CreateAudienceContactRequestEmailChannelMarketingConsent $marketingConsent A contact's current consent status for email marketing communications. See the [Audiences (BETA) documentation](https://mailchimp.com/developer/marketing/docs/audiences-introduction) to learn about supported values.
     */
    #[JsonProperty('marketing_consent')]
    public ?CreateAudienceContactRequestEmailChannelMarketingConsent $marketingConsent;

    /**
     * @param array{
     *   email?: ?string,
     *   marketingConsent?: ?CreateAudienceContactRequestEmailChannelMarketingConsent,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->marketingConsent = $values['marketingConsent'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
