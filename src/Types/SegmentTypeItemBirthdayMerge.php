<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by a contact's birthday.
 */
class SegmentTypeItemBirthdayMerge extends JsonSerializableType
{
    /**
     * @var string $field A date merge field to segment.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemBirthdayMergeOp> $op Whether the member's birthday merge information is/is not a certain date or is/is not blank.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var ?string $value A date to segment against (mm/dd).
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   field: string,
     *   op: value-of<SegmentTypeItemBirthdayMergeOp>,
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
