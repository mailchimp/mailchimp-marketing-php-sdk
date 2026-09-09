<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by interaction with a campaign via Conversations.
 */
class SegmentTypeItemConversation extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemConversationField> $field Segment by interaction with a campaign via Conversations.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemConversationOp> $op The status of a member's interaction with a conversation. One of the following: has replied or has not replied.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var string $value The web id value for a specific campaign or 'any' to account for subscribers who have/have not interacted with any campaigns.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemConversationField>,
     *   op: value-of<SegmentTypeItemConversationOp>,
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
