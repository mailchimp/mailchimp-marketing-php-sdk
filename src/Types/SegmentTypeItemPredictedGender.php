<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by predicted gender.
 */
class SegmentTypeItemPredictedGender extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemPredictedGenderField> $field Segment by predicted gender.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemPredictedGenderOp> $op Members who are/not the exact criteria listed.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var value-of<SegmentTypeItemPredictedGenderValue> $value The predicted gender to segment.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemPredictedGenderField>,
     *   op: value-of<SegmentTypeItemPredictedGenderOp>,
     *   value: value-of<SegmentTypeItemPredictedGenderValue>,
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
