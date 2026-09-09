<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by social network in Social Profiles data.
 */
class SegmentTypeItemSocialNetworkFollow extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemSocialNetworkFollowField> $field Segment by social network in Social Profiles data.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemSocialNetworkFollowOp> $op Members who are/not following a linked account on a given social network.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var value-of<SegmentTypeItemSocialNetworkFollowValue> $value The social network to segment against.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemSocialNetworkFollowField>,
     *   op: value-of<SegmentTypeItemSocialNetworkFollowOp>,
     *   value: value-of<SegmentTypeItemSocialNetworkFollowValue>,
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
