<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

/**
 * Segment by member rating.
 */
class SegmentTypeItemMemberRating extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemMemberRatingField> $field Segment by member rating.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemMemberRatingOp> $op Members who have have a rating that is/not exactly a given number or members who have a rating greater/less than a given number.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var (
     *    float
     *   |string
     * ) $value
     */
    #[JsonProperty('value'), Union('float', 'string')]
    public float|string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemMemberRatingField>,
     *   op: value-of<SegmentTypeItemMemberRatingOp>,
     *   value: (
     *    float
     *   |string
     * ),
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
