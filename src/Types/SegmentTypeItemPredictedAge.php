<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by predicted age.
 */
class SegmentTypeItemPredictedAge extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemPredictedAgeField> $field Segment by predicted age.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemPredictedAgeOp> $op Members who are/not the exact criteria listed.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var value-of<SegmentTypeItemPredictedAgeValue> $value The predicted age to segment.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemPredictedAgeField>,
     *   op: value-of<SegmentTypeItemPredictedAgeOp>,
     *   value: value-of<SegmentTypeItemPredictedAgeValue>,
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
