<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by VIP status.
 */
class SegmentTypeItemVip extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemVipField> $field Segment by VIP status.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemVipOp> $op Whether the member is or is not marked as VIP.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemVipField>,
     *   op: value-of<SegmentTypeItemVipOp>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->field = $values['field'];
        $this->op = $values['op'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
