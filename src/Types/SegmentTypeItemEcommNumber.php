<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

/**
 * Segment by average spent total, number of orders, total number of products purchased, or average number of products per order.
 */
class SegmentTypeItemEcommNumber extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemEcommNumberField> $field Segment by average spent total, number of orders, total number of products purchased, or average number of products per order.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemEcommNumberOp> $op Members who have spent exactly, have not spent exactly, spent more, or spent less than the segment value.
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
     *   field: value-of<SegmentTypeItemEcommNumberField>,
     *   op: value-of<SegmentTypeItemEcommNumberOp>,
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
