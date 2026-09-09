<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by social network in Social Profiles data.
 */
class SegmentTypeItemSocialNetworkMember extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemSocialNetworkMemberField> $field Segment by social network in Social Profiles data.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemSocialNetworkMemberOp> $op Members who are/not on a given social network.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var value-of<SegmentTypeItemSocialNetworkMemberValue> $value The social network to segment against.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemSocialNetworkMemberField>,
     *   op: value-of<SegmentTypeItemSocialNetworkMemberOp>,
     *   value: value-of<SegmentTypeItemSocialNetworkMemberValue>,
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
