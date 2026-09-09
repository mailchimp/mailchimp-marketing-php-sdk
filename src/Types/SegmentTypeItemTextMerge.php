<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by a given text or number merge field.
 */
class SegmentTypeItemTextMerge extends JsonSerializableType
{
    /**
     * @var string $field A text or number merge field to segment.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemTextMergeOp> $op Whether the member's merge information is/is not, contains/does not contain, starts/ends with, or is greater/less than a value
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var ?string $value The value to segment a text or number merge field with.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   field: string,
     *   op: value-of<SegmentTypeItemTextMergeOp>,
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
