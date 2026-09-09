<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * List settings for the campaign.
 */
class AutomationWorkflowEmailRecipients extends JsonSerializableType
{
    /**
     * @var ?string $listId The unique list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?bool $listIsActive The status of the list used, namely if it's deleted or disabled.
     */
    #[JsonProperty('list_is_active')]
    public ?bool $listIsActive;

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
     * @var ?AutomationWorkflowEmailRecipientsSegmentOpts $segmentOpts An object representing all segmentation options. This object should contain a `saved_segment_id` to use an existing segment, or you can create a new segment by including both `match` and `conditions` options.
     */
    #[JsonProperty('segment_opts')]
    public ?AutomationWorkflowEmailRecipientsSegmentOpts $segmentOpts;

    /**
     * @var ?string $segmentText A description of the [segment](https://mailchimp.com/help/getting-started-with-groups/) used for the campaign. Formatted as a string marked up with HTML.
     */
    #[JsonProperty('segment_text')]
    public ?string $segmentText;

    /**
     * @param array{
     *   listId?: ?string,
     *   listIsActive?: ?bool,
     *   listName?: ?string,
     *   recipientCount?: ?int,
     *   segmentOpts?: ?AutomationWorkflowEmailRecipientsSegmentOpts,
     *   segmentText?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->listId = $values['listId'] ?? null;
        $this->listIsActive = $values['listIsActive'] ?? null;
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
