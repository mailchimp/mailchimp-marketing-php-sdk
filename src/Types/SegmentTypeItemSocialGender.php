<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by listed gender in Social Profiles data.
 */
class SegmentTypeItemSocialGender extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemSocialGenderField> $field Segment by listed gender in Social Profiles data.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemSocialGenderOp> $op Members who are/not the exact criteria listed.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var value-of<SegmentTypeItemSocialGenderValue> $value The Social Profiles gender to segment.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemSocialGenderField>,
     *   op: value-of<SegmentTypeItemSocialGenderOp>,
     *   value: value-of<SegmentTypeItemSocialGenderValue>,
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
