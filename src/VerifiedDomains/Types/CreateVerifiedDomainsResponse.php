<?php

namespace Mailchimp\VerifiedDomains\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * The verified domains currently on the account.
 */
class CreateVerifiedDomainsResponse extends JsonSerializableType
{
    /**
     * @var ?bool $authenticated Whether domain authentication is enabled for this domain.
     */
    #[JsonProperty('authenticated')]
    public ?bool $authenticated;

    /**
     * @var ?string $domain The name of this domain.
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?bool $isFreeEmailProvider Returns whether the domain used is a public / free email provider. See [Limitations of Free Email Addresses](https://mailchimp.com/help/limitations-of-free-email-addresses/) for more details.
     */
    #[JsonProperty('is_free_email_provider')]
    public ?bool $isFreeEmailProvider;

    /**
     * @var ?value-of<CreateVerifiedDomainsResponseStatus> $status The Domain's current status.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $verificationEmail The e-mail address receiving the two-factor challenge for this domain.
     */
    #[JsonProperty('verification_email')]
    public ?string $verificationEmail;

    /**
     * @var ?DateTime $verificationSent The date/time that the two-factor challenge was sent to the verification email.
     */
    #[JsonProperty('verification_sent'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $verificationSent;

    /**
     * @var ?bool $verified Whether the domain has been verified for sending.
     */
    #[JsonProperty('verified')]
    public ?bool $verified;

    /**
     * @param array{
     *   authenticated?: ?bool,
     *   domain?: ?string,
     *   isFreeEmailProvider?: ?bool,
     *   status?: ?value-of<CreateVerifiedDomainsResponseStatus>,
     *   verificationEmail?: ?string,
     *   verificationSent?: ?DateTime,
     *   verified?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->authenticated = $values['authenticated'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->isFreeEmailProvider = $values['isFreeEmailProvider'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->verificationEmail = $values['verificationEmail'] ?? null;
        $this->verificationSent = $values['verificationSent'] ?? null;
        $this->verified = $values['verified'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
