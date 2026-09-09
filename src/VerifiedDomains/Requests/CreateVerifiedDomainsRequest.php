<?php

namespace Mailchimp\VerifiedDomains\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateVerifiedDomainsRequest extends JsonSerializableType
{
    /**
     * @var string $verificationEmail The e-mail address at the domain you want to verify. This will receive a two-factor challenge to be used in the verify action.
     */
    #[JsonProperty('verification_email')]
    public string $verificationEmail;

    /**
     * @param array{
     *   verificationEmail: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->verificationEmail = $values['verificationEmail'];
    }
}
