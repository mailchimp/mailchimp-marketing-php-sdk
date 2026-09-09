<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Core\Types\Union;

/**
 * An object representing all segmentation options. This object should contain a `saved_segment_id` to use an existing segment, or you can create a new segment by including both `match` and `conditions` options.
 */
class CampaignRecipientsSegmentOpts extends JsonSerializableType
{
    /**
     * @var ?array<SegmentTypeItem> $conditions
     */
    #[JsonProperty('conditions'), ArrayType([SegmentTypeItem::class])]
    public ?array $conditions;

    /**
     * @var ?value-of<CampaignRecipientsSegmentOptsMatch> $match Segment match type.
     */
    #[JsonProperty('match')]
    public ?string $match;

    /**
     * @var ?string $prebuiltSegmentId The prebuilt segment id, if a prebuilt segment has been designated for this campaign.
     */
    #[JsonProperty('prebuilt_segment_id')]
    public ?string $prebuiltSegmentId;

    /**
     * @var (
     *    int
     *   |string
     * )|null $savedSegmentId The id for an existing saved segment.
     */
    #[JsonProperty('saved_segment_id'), Union('integer', 'string', 'null')]
    public int|string|null $savedSegmentId;

    /**
     * @param array{
     *   conditions?: ?array<SegmentTypeItem>,
     *   match?: ?value-of<CampaignRecipientsSegmentOptsMatch>,
     *   prebuiltSegmentId?: ?string,
     *   savedSegmentId?: (
     *    int
     *   |string
     * )|null,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conditions = $values['conditions'] ?? null;
        $this->match = $values['match'] ?? null;
        $this->prebuiltSegmentId = $values['prebuiltSegmentId'] ?? null;
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
