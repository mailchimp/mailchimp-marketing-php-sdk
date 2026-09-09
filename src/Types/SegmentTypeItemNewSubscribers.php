<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by when people subscribed.
 */
class SegmentTypeItemNewSubscribers extends JsonSerializableType
{
    /**
     * @var ?value-of<SegmentTypeItemNewSubscribersField> $field Segment by when people subscribed.
     */
    #[JsonProperty('field')]
    public ?string $field;

    /**
     * @var ?value-of<SegmentTypeItemNewSubscribersOp> $op Whe the event took place, namely within a time frame.
     */
    #[JsonProperty('op')]
    public ?string $op;

    /**
     * @var ?string $value What type of data to segment on: a specific date, a specific campaign, or the last campaign sent.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   field?: ?value-of<SegmentTypeItemNewSubscribersField>,
     *   op?: ?value-of<SegmentTypeItemNewSubscribersOp>,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->field = $values['field'] ?? null;
        $this->op = $values['op'] ?? null;
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
