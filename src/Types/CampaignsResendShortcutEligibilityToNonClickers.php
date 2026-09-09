<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Determines if the campaign qualifies to be resent to non-clickers.
 */
class CampaignsResendShortcutEligibilityToNonClickers extends JsonSerializableType
{
    /**
     * @var ?bool $isEligible Determines if the campaign qualifies to be resent to this segment.
     */
    #[JsonProperty('is_eligible')]
    public ?bool $isEligible;

    /**
     * @var ?string $reason The reason the campaign is not eligible to be resent to this segment.
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   isEligible?: ?bool,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->isEligible = $values['isEligible'] ?? null;
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
