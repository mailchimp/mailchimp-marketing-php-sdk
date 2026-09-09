<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

/**
 * Segment by a given static segment.
 */
class SegmentTypeItemStaticSegment extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemStaticSegmentField> $field Segment by a given static segment.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemStaticSegmentOp> $op Members who are/are not apart of a static segment.
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
     *   field: value-of<SegmentTypeItemStaticSegmentField>,
     *   op: value-of<SegmentTypeItemStaticSegmentOp>,
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
