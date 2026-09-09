<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by age ranges in Social Profiles data.
 */
class SegmentTypeItemSocialAge extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemSocialAgeField> $field Segment by age ranges in Social Profiles data.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemSocialAgeOp> $op Members who are/not the exact criteria listed.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var value-of<SegmentTypeItemSocialAgeValue> $value The age range to segment.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemSocialAgeField>,
     *   op: value-of<SegmentTypeItemSocialAgeOp>,
     *   value: value-of<SegmentTypeItemSocialAgeValue>,
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
