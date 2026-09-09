<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by a specific date field.
 */
class SegmentTypeItemDate extends JsonSerializableType
{
    /**
     * @var ?string $extra When segmenting on 'date' or 'campaign', the date for the segment formatted as YYYY-MM-DD or the web id for the campaign.
     */
    #[JsonProperty('extra')]
    public ?string $extra;

    /**
     * @var value-of<SegmentTypeItemDateField> $field The type of date field to segment on: The opt-in time for a signup, the date the subscriber was last updated, or the date of their last ecomm purchase.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemDateOp> $op When the event took place:  Before, after, is a specific date, is not a specific date, is blank, or is not blank.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var string $value What type of data to segment on: a specific date, a specific campaign, or the last campaign sent.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemDateField>,
     *   op: value-of<SegmentTypeItemDateOp>,
     *   value: string,
     *   extra?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->extra = $values['extra'] ?? null;
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
