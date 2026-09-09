<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Information about campaigns related through shortcuts.
 */
class CampaignsResendShortcutUsage extends JsonSerializableType
{
    /**
     * @var ?CampaignsResendShortcutUsageOriginalCampaign $originalCampaign The original campaign that was resent.
     */
    #[JsonProperty('original_campaign')]
    public ?CampaignsResendShortcutUsageOriginalCampaign $originalCampaign;

    /**
     * @var ?array<CampaignsResendShortcutUsageShortcutCampaignsItem> $shortcutCampaigns Campaigns that were created from Campaign Resend Shortcuts for this campaign
     */
    #[JsonProperty('shortcut_campaigns'), ArrayType([CampaignsResendShortcutUsageShortcutCampaignsItem::class])]
    public ?array $shortcutCampaigns;

    /**
     * @param array{
     *   originalCampaign?: ?CampaignsResendShortcutUsageOriginalCampaign,
     *   shortcutCampaigns?: ?array<CampaignsResendShortcutUsageShortcutCampaignsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->originalCampaign = $values['originalCampaign'] ?? null;
        $this->shortcutCampaigns = $values['shortcutCampaigns'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
