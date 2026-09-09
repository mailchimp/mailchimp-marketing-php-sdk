<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by an address-type merge field.
 */
class SegmentTypeItemAddressMerge extends JsonSerializableType
{
    /**
     * @var string $field An address-type merge field to segment.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemAddressMergeOp> $op Whether the member's address merge field contains/does not contain a value or is/is not blank.
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
     *   op: value-of<SegmentTypeItemAddressMergeOp>,
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
