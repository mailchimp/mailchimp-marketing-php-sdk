<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by Goal activity.
 */
class SegmentTypeItemGoalActivity extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemGoalActivityField> $field Segment by Goal activity.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemGoalActivityOp> $op Whether the website URL is/not exactly, contains/doesn't contain, starts with/ends with a string.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var string $value The URL to check Goal activity against.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemGoalActivityField>,
     *   op: value-of<SegmentTypeItemGoalActivityOp>,
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
