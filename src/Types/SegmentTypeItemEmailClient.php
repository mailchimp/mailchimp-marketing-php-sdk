<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by use of a particular email client.
 */
class SegmentTypeItemEmailClient extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemEmailClientField> $field Segment by use of a particular email client.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemEmailClientOp> $op The operation to determine whether we select clients that match the value, or clients that do not match the value.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var string $value The name of the email client.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemEmailClientField>,
     *   op: value-of<SegmentTypeItemEmailClientOp>,
     *   value: string,
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
