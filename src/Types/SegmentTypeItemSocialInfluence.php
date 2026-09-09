<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by influence rating in Social Profiles data.
 */
class SegmentTypeItemSocialInfluence extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemSocialInfluenceField> $field Segment by influence rating in Social Profiles data.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemSocialInfluenceOp> $op Members who have a rating that is/not or greater/less than the rating provided.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var float $value The Social Profiles influence rating to segment.
     */
    #[JsonProperty('value')]
    public float $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemSocialInfluenceField>,
     *   op: value-of<SegmentTypeItemSocialInfluenceOp>,
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
