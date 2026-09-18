<?php

namespace Mailchimp\Audiences\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateAudienceContactRequestSmsChannel extends JsonSerializableType
{
    /**
     * @var ?CreateAudienceContactRequestSmsChannelMarketingConsent $marketingConsent A contact's current consent status for SMS marketing communications. See the [Audiences (BETA) documentation](https://mailchimp.com/developer/marketing/docs/audiences-introduction) to learn about supported values.
     */
    #[JsonProperty('marketing_consent')]
    public ?CreateAudienceContactRequestSmsChannelMarketingConsent $marketingConsent;

    /**
     * @var ?string $smsPhone SMS Phone Number
     */
    #[JsonProperty('sms_phone')]
    public ?string $smsPhone;

    /**
     * @param array{
     *   marketingConsent?: ?CreateAudienceContactRequestSmsChannelMarketingConsent,
     *   smsPhone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->marketingConsent = $values['marketingConsent'] ?? null;
        $this->smsPhone = $values['smsPhone'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
