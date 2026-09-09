<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * An individual segment condition
 */
class SegmentTypeItemSelectMerge extends JsonSerializableType
{
    /**
     * @var string $field A merge field to segment.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemSelectMergeOp> $op Whether the member's merge information is/is not a value or is/is not blank.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var ?string $value The value to segment a text merge field with.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   field: string,
     *   op: value-of<SegmentTypeItemSelectMergeOp>,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->field = $values['field'];
        $this->op = $values['op'];
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
