<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by poll activity.
 */
class SegmentTypeItemCampaignPoll extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemCampaignPollField> $field Segment by poll activity.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemCampaignPollOp> $op Members have/have not interacted with a specific poll in a Mailchimp email.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var float $value The id for the poll.
     */
    #[JsonProperty('value')]
    public float $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemCampaignPollField>,
     *   op: value-of<SegmentTypeItemCampaignPollOp>,
     *   value: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->field = $values['field'];
        $this->op = $values['op'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
