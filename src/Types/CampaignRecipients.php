<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * List settings for the campaign.
 */
class CampaignRecipients extends JsonSerializableType
{
    /**
     * @var string $listId The unique list id.
     */
    #[JsonProperty('list_id')]
    public string $listId;

    /**
     * @var ?string $listName The name of the list.
     */
    #[JsonProperty('list_name')]
    public ?string $listName;

    /**
     * @var ?int $recipientCount Count of the recipients on the associated list. Formatted as an integer.
     */
    #[JsonProperty('recipient_count')]
    public ?int $recipientCount;

    /**
     * @var ?CampaignRecipientsSegmentOpts $segmentOpts An object representing all segmentation options. This object should contain a `saved_segment_id` to use an existing segment, or you can create a new segment by including both `match` and `conditions` options.
     */
    #[JsonProperty('segment_opts')]
    public ?CampaignRecipientsSegmentOpts $segmentOpts;

    /**
     * @var ?string $segmentText A description of the [segment](https://mailchimp.com/help/save-and-manage-segments/) used for the campaign. Formatted as a string marked up with HTML.
     */
    #[JsonProperty('segment_text')]
    public ?string $segmentText;

    /**
     * @param array{
     *   listId: string,
     *   listName?: ?string,
     *   recipientCount?: ?int,
     *   segmentOpts?: ?CampaignRecipientsSegmentOpts,
     *   segmentText?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->listId = $values['listId'];
        $this->listName = $values['listName'] ?? null;
        $this->recipientCount = $values['recipientCount'] ?? null;
        $this->segmentOpts = $values['segmentOpts'] ?? null;
        $this->segmentText = $values['segmentText'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
