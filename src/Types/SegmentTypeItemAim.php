<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by interaction with a specific campaign.
 */
class SegmentTypeItemAim extends JsonSerializableType
{
    /**
     * @var ?value-of<SegmentTypeItemAimField> $field Segment by interaction with a specific campaign.
     */
    #[JsonProperty('field')]
    public ?string $field;

    /**
     * @var ?value-of<SegmentTypeItemAimOp> $op The status of the member with regard to their campaign interaction. One of the following: opened, clicked, was sent, didn't open, didn't click, or was not sent.
     */
    #[JsonProperty('op')]
    public ?string $op;

    /**
     * @var ?string $value Either the web id value for a specific campaign or 'any' to account for subscribers who have/have not interacted with any campaigns.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   field?: ?value-of<SegmentTypeItemAimField>,
     *   op?: ?value-of<SegmentTypeItemAimOp>,
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
