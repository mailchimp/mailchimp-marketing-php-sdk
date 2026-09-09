<?php

namespace Mailchimp\Campaigns\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Types\SegmentTypeItem;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * An object representing all segmentation options. This object should contain a `saved_segment_id` to use an existing segment, or you can create a new segment by including both `match` and `conditions` options.
 */
class CreateCampaignsRequestRecipientsSegmentOpts extends JsonSerializableType
{
    /**
     * @var ?array<SegmentTypeItem> $conditions
     */
    #[JsonProperty('conditions'), ArrayType([SegmentTypeItem::class])]
    public ?array $conditions;

    /**
     * @var ?value-of<CreateCampaignsRequestRecipientsSegmentOptsMatch> $match Segment match type.
     */
    #[JsonProperty('match')]
    public ?string $match;

    /**
     * @var ?int $savedSegmentId The id for an existing saved segment.
     */
    #[JsonProperty('saved_segment_id')]
    public ?int $savedSegmentId;

    /**
     * @param array{
     *   conditions?: ?array<SegmentTypeItem>,
     *   match?: ?value-of<CreateCampaignsRequestRecipientsSegmentOptsMatch>,
     *   savedSegmentId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conditions = $values['conditions'] ?? null;
        $this->match = $values['match'] ?? null;
        $this->savedSegmentId = $values['savedSegmentId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
