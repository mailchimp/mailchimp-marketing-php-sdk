<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

/**
 * Segment by similar subscribers.
 */
class SegmentTypeItemFuzzySegment extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemFuzzySegmentField> $field Segment by similar subscribers.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemFuzzySegmentOp> $op Members who are/are not apart of a 'similar subscribers' segment.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var (
     *    float
     *   |string
     * ) $value
     */
    #[JsonProperty('value'), Union('float', 'string')]
    public float|string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemFuzzySegmentField>,
     *   op: value-of<SegmentTypeItemFuzzySegmentOp>,
     *   value: (
     *    float
     *   |string
     * ),
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
