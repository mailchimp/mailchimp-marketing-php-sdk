<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;
use Mailchimp\Core\Types\ArrayType;

/**
 * A single SMS campaign.
 */
class SmsCampaign extends JsonSerializableType
{
    /**
     * @var ?string $id A string that uniquely identifies this campaign.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $webId The ID used in the Mailchimp web application.
     */
    #[JsonProperty('web_id')]
    public ?string $webId;

    /**
     * @var ?string $name The name of the campaign.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $status The current status of the campaign.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $channel The channel for this campaign (sms or whatsapp).
     */
    #[JsonProperty('channel')]
    public ?string $channel;

    /**
     * @var ?int $listId The numeric ID of the list associated with this campaign.
     */
    #[JsonProperty('list_id')]
    public ?int $listId;

    /**
     * @var ?int $recipientCount The number of recipients for this campaign.
     */
    #[JsonProperty('recipient_count')]
    public ?int $recipientCount;

    /**
     * @var ?DateTime $createTime The date and time the campaign was created.
     */
    #[JsonProperty('create_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createTime;

    /**
     * @var ?DateTime $sendTime The date and time the campaign is scheduled to send.
     */
    #[JsonProperty('send_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sendTime;

    /**
     * @var ?DateTime $updatedAt The date and time the campaign was last updated.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?DateTime $expireTime The date and time the campaign will stop sending in ISO 8601 format.
     */
    #[JsonProperty('expire_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expireTime;

    /**
     * @var ?bool $isSendNow Whether the campaign is configured to send immediately.
     */
    #[JsonProperty('is_send_now')]
    public ?bool $isSendNow;

    /**
     * @var ?string $folderId The ID of the folder this campaign is in.
     */
    #[JsonProperty('folder_id')]
    public ?string $folderId;

    /**
     * @var ?array<int> $segments The segment IDs used to target recipients for this campaign.
     */
    #[JsonProperty('segments'), ArrayType(['integer'])]
    public ?array $segments;

    /**
     * @var ?array<int> $excludedSegments The segment IDs excluded from receiving this campaign.
     */
    #[JsonProperty('excluded_segments'), ArrayType(['integer'])]
    public ?array $excludedSegments;

    /**
     * @var ?array<SmsCampaignLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([SmsCampaignLinksItem::class])]
    public ?array $links;

    /**
     * @param array{
     *   id?: ?string,
     *   webId?: ?string,
     *   name?: ?string,
     *   status?: ?string,
     *   channel?: ?string,
     *   listId?: ?int,
     *   recipientCount?: ?int,
     *   createTime?: ?DateTime,
     *   sendTime?: ?DateTime,
     *   updatedAt?: ?DateTime,
     *   expireTime?: ?DateTime,
     *   isSendNow?: ?bool,
     *   folderId?: ?string,
     *   segments?: ?array<int>,
     *   excludedSegments?: ?array<int>,
     *   links?: ?array<SmsCampaignLinksItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->webId = $values['webId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->channel = $values['channel'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->recipientCount = $values['recipientCount'] ?? null;
        $this->createTime = $values['createTime'] ?? null;
        $this->sendTime = $values['sendTime'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->expireTime = $values['expireTime'] ?? null;
        $this->isSendNow = $values['isSendNow'] ?? null;
        $this->folderId = $values['folderId'] ?? null;
        $this->segments = $values['segments'] ?? null;
        $this->excludedSegments = $values['excludedSegments'] ?? null;
        $this->links = $values['links'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
