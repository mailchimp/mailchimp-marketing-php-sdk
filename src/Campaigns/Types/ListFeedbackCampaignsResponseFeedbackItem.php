<?php

namespace Mailchimp\Campaigns\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A specific feedback message from a specific campaign.
 */
class ListFeedbackCampaignsResponseFeedbackItem extends JsonSerializableType
{
    /**
     * @var ?array<ListFeedbackCampaignsResponseFeedbackItemLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListFeedbackCampaignsResponseFeedbackItemLinksItem::class])]
    public ?array $links;

    /**
     * @var ?int $blockId The block id for the editable block that the feedback addresses.
     */
    #[JsonProperty('block_id')]
    public ?int $blockId;

    /**
     * @var ?string $campaignId The unique id for the campaign.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?DateTime $createdAt The date and time the feedback item was created in ISO 8601 format.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $createdBy The login name of the user who created the feedback.
     */
    #[JsonProperty('created_by')]
    public ?string $createdBy;

    /**
     * @var ?int $feedbackId The individual id for the feedback item.
     */
    #[JsonProperty('feedback_id')]
    public ?int $feedbackId;

    /**
     * @var ?bool $isComplete The status of feedback.
     */
    #[JsonProperty('is_complete')]
    public ?bool $isComplete;

    /**
     * @var string $message The content of the feedback.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var ?int $parentId If a reply, the id of the parent feedback item.
     */
    #[JsonProperty('parent_id')]
    public ?int $parentId;

    /**
     * @var ?value-of<ListFeedbackCampaignsResponseFeedbackItemSource> $source The source of the feedback.
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?DateTime $updatedAt The date and time the feedback was last updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   message: string,
     *   links?: ?array<ListFeedbackCampaignsResponseFeedbackItemLinksItem>,
     *   blockId?: ?int,
     *   campaignId?: ?string,
     *   createdAt?: ?DateTime,
     *   createdBy?: ?string,
     *   feedbackId?: ?int,
     *   isComplete?: ?bool,
     *   parentId?: ?int,
     *   source?: ?value-of<ListFeedbackCampaignsResponseFeedbackItemSource>,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->links = $values['links'] ?? null;
        $this->blockId = $values['blockId'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->createdBy = $values['createdBy'] ?? null;
        $this->feedbackId = $values['feedbackId'] ?? null;
        $this->isComplete = $values['isComplete'] ?? null;
        $this->message = $values['message'];
        $this->parentId = $values['parentId'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
