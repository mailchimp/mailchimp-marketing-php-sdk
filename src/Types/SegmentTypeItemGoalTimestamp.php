<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by most recent interaction with a website.
 */
class SegmentTypeItemGoalTimestamp extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemGoalTimestampField> $field Segment by most recent interaction with a website.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemGoalTimestampOp> $op Whether the website activity happened after, before, or at a given timestamp.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var string $value The date to check Goal activity against.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemGoalTimestampField>,
     *   op: value-of<SegmentTypeItemGoalTimestampOp>,
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
