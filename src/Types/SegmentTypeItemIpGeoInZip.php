<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by a specific US ZIP code.
 */
class SegmentTypeItemIpGeoInZip extends JsonSerializableType
{
    /**
     * @var int $extra The zip code to segment against.
     */
    #[JsonProperty('extra')]
    public int $extra;

    /**
     * @var value-of<SegmentTypeItemIpGeoInZipField> $field Segmenting subscribers who are within a specific location.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemIpGeoInZipOp> $op Segment members who are within a specific US zip code.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var int $value The radius of the target location.
     */
    #[JsonProperty('value')]
    public int $value;

    /**
     * @param array{
     *   extra: int,
     *   field: value-of<SegmentTypeItemIpGeoInZipField>,
     *   op: value-of<SegmentTypeItemIpGeoInZipOp>,
     *   value: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->extra = $values['extra'];
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
