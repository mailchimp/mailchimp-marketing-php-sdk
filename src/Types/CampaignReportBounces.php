<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * An object describing the bounce summary for the campaign.
 */
class CampaignReportBounces extends JsonSerializableType
{
    /**
     * @var ?int $hardBounces The total number of hard bounced email addresses.
     */
    #[JsonProperty('hard_bounces')]
    public ?int $hardBounces;

    /**
     * @var ?int $softBounces The total number of soft bounced email addresses.
     */
    #[JsonProperty('soft_bounces')]
    public ?int $softBounces;

    /**
     * @var ?int $syntaxErrors The total number of addresses that were syntax-related bounces.
     */
    #[JsonProperty('syntax_errors')]
    public ?int $syntaxErrors;

    /**
     * @param array{
     *   hardBounces?: ?int,
     *   softBounces?: ?int,
     *   syntaxErrors?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->hardBounces = $values['hardBounces'] ?? null;
        $this->softBounces = $values['softBounces'] ?? null;
        $this->syntaxErrors = $values['syntaxErrors'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
