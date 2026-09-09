<?php

namespace Mailchimp\VerifiedDomains\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateActionVerifyVerifiedDomainsRequest extends JsonSerializableType
{
    /**
     * @var string $code The code that was sent to the email address provided when adding a new domain to verify.
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @param array{
     *   code: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
    }
}
