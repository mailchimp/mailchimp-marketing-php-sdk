<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

/**
 * Segment by amount spent on a single order or across all orders.
 */
class SegmentTypeItemEcommSpent extends JsonSerializableType
{
    /**
     * @var ?value-of<SegmentTypeItemEcommSpentField> $field Segment by amount spent on a single order or across all orders.
     */
    #[JsonProperty('field')]
    public ?string $field;

    /**
     * @var ?value-of<SegmentTypeItemEcommSpentOp> $op Members who have spent 'more' or 'less' than then specified value.
     */
    #[JsonProperty('op')]
    public ?string $op;

    /**
     * @var (
     *    float
     *   |string
     * )|null $value
     */
    #[JsonProperty('value'), Union('float', 'string', 'null')]
    public float|string|null $value;

    /**
     * @param array{
     *   field?: ?value-of<SegmentTypeItemEcommSpentField>,
     *   op?: ?value-of<SegmentTypeItemEcommSpentOp>,
     *   value?: (
     *    float
     *   |string
     * )|null,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->field = $values['field'] ?? null;
        $this->op = $values['op'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
