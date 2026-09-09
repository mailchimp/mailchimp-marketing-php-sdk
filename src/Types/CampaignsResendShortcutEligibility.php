<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Determines if the campaign qualifies for the Campaign Resend Shortcuts. Only included when query parameter `include_resend_shortcuts` is `true`.
 */
class CampaignsResendShortcutEligibility extends JsonSerializableType
{
    /**
     * @var ?CampaignsResendShortcutEligibilityToNewSubscribers $toNewSubscribers Determines if the campaign qualifies to be resent to new subscribers.
     */
    #[JsonProperty('to_new_subscribers')]
    public ?CampaignsResendShortcutEligibilityToNewSubscribers $toNewSubscribers;

    /**
     * @var ?CampaignsResendShortcutEligibilityToNonClickers $toNonClickers Determines if the campaign qualifies to be resent to non-clickers.
     */
    #[JsonProperty('to_non_clickers')]
    public ?CampaignsResendShortcutEligibilityToNonClickers $toNonClickers;

    /**
     * @var ?CampaignsResendShortcutEligibilityToNonOpeners $toNonOpeners Determines if the campaign qualifies to be resent to non-openers.
     */
    #[JsonProperty('to_non_openers')]
    public ?CampaignsResendShortcutEligibilityToNonOpeners $toNonOpeners;

    /**
     * @var ?CampaignsResendShortcutEligibilityToNonPurchasers $toNonPurchasers Determines if the campaign qualifies to be resent to non-purchasers.
     */
    #[JsonProperty('to_non_purchasers')]
    public ?CampaignsResendShortcutEligibilityToNonPurchasers $toNonPurchasers;

    /**
     * @param array{
     *   toNewSubscribers?: ?CampaignsResendShortcutEligibilityToNewSubscribers,
     *   toNonClickers?: ?CampaignsResendShortcutEligibilityToNonClickers,
     *   toNonOpeners?: ?CampaignsResendShortcutEligibilityToNonOpeners,
     *   toNonPurchasers?: ?CampaignsResendShortcutEligibilityToNonPurchasers,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->toNewSubscribers = $values['toNewSubscribers'] ?? null;
        $this->toNonClickers = $values['toNonClickers'] ?? null;
        $this->toNonOpeners = $values['toNonOpeners'] ?? null;
        $this->toNonPurchasers = $values['toNonPurchasers'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
