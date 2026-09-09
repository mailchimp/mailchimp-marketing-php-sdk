<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

class CampaignsResendShortcutUsageShortcutCampaignsItem extends JsonSerializableType
{
    /**
     * @var ?string $id Unique ID for the resent campaign.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $sendTime The date and time a resent campaign was sent.
     */
    #[JsonProperty('send_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sendTime;

    /**
     * @var ?value-of<CampaignsResendShortcutUsageShortcutCampaignsItemShortcutType> $shortcutType Which campaign resend shortcut was used.
     */
    #[JsonProperty('shortcut_type')]
    public ?string $shortcutType;

    /**
     * @var ?value-of<CampaignsResendShortcutUsageShortcutCampaignsItemStatus> $status The current status of the campaign.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?int $webId The ID for the resent campaign used in the Mailchimp web application. View this campaign in your Mailchimp account at `https://{dc}.admin.mailchimp.com/campaigns/show/?id={web_id}`.
     */
    #[JsonProperty('web_id')]
    public ?int $webId;

    /**
     * @param array{
     *   id?: ?string,
     *   sendTime?: ?DateTime,
     *   shortcutType?: ?value-of<CampaignsResendShortcutUsageShortcutCampaignsItemShortcutType>,
     *   status?: ?value-of<CampaignsResendShortcutUsageShortcutCampaignsItemStatus>,
     *   webId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->sendTime = $values['sendTime'] ?? null;
        $this->shortcutType = $values['shortcutType'] ?? null;
        $this->status = $values['status'] ?? null;
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
