<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment members whose location information is unknown.
 */
class SegmentTypeItemIpGeoUnknown extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemIpGeoUnknownField> $field Segmenting subscribers who are within a specific location.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemIpGeoUnknownOp> $op Segment members for which location information is unknown.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemIpGeoUnknownField>,
     *   op: value-of<SegmentTypeItemIpGeoUnknownOp>,
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
