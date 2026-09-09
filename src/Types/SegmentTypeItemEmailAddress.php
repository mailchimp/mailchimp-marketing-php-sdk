<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by email address.
 */
class SegmentTypeItemEmailAddress extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemEmailAddressField> $field Segmenting based off of a subscriber's email address.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemEmailAddressOp> $op Whether the email address is/not exactly, contains/doesn't contain, starts/ends with a string.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var ?string $value The value to compare the email against.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemEmailAddressField>,
     *   op: value-of<SegmentTypeItemEmailAddressOp>,
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
