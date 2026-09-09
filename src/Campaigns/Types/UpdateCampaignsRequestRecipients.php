<?php

namespace Mailchimp\Campaigns\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * List settings for the campaign.
 */
class UpdateCampaignsRequestRecipients extends JsonSerializableType
{
    /**
     * @var ?string $listId The unique list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?UpdateCampaignsRequestRecipientsSegmentOpts $segmentOpts An object representing all segmentation options. This object should contain a `saved_segment_id` to use an existing segment, or you can create a new segment by including both `match` and `conditions` options.
     */
    #[JsonProperty('segment_opts')]
    public ?UpdateCampaignsRequestRecipientsSegmentOpts $segmentOpts;

    /**
     * @param array{
     *   listId?: ?string,
     *   segmentOpts?: ?UpdateCampaignsRequestRecipientsSegmentOpts,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->listId = $values['listId'] ?? null;
        $this->segmentOpts = $values['segmentOpts'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
