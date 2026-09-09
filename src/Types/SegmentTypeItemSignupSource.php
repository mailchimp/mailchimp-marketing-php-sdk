<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by signup source.
 */
class SegmentTypeItemSignupSource extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemSignupSourceField> $field
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemSignupSourceOp> $op Whether the member's signup source was/was not a particular value.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var ?string $value The signup source.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemSignupSourceField>,
     *   op: value-of<SegmentTypeItemSignupSourceOp>,
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
