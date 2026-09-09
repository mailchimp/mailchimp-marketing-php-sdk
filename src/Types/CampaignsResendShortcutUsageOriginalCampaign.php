<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The original campaign that was resent.
 */
class CampaignsResendShortcutUsageOriginalCampaign extends JsonSerializableType
{
    /**
     * @var ?string $id ID for the resent campaign.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?value-of<CampaignsResendShortcutUsageOriginalCampaignShortcutType> $shortcutType Which campaign resend shortcut was used.
     */
    #[JsonProperty('shortcut_type')]
    public ?string $shortcutType;

    /**
     * @var ?string $title The title of the original campaign.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?int $webId The ID for the resent campaign used in the Mailchimp web application. View this campaign in your Mailchimp account at `https://{dc}.admin.mailchimp.com/campaigns/show/?id={web_id}`.
     */
    #[JsonProperty('web_id')]
    public ?int $webId;

    /**
     * @param array{
     *   id?: ?string,
     *   shortcutType?: ?value-of<CampaignsResendShortcutUsageOriginalCampaignShortcutType>,
     *   title?: ?string,
     *   webId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->shortcutType = $values['shortcutType'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->webId = $values['webId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
