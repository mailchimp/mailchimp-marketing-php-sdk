<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by a specific US ZIP code.
 */
class SegmentTypeItemIpGeoZip extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemIpGeoZipField> $field Segmenting subscribers who are within a specific location.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemIpGeoZipOp> $op Segment members who are/are not within a specific US zip code.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var int $value The 5-digit zip code.
     */
    #[JsonProperty('value')]
    public int $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemIpGeoZipField>,
     *   op: value-of<SegmentTypeItemIpGeoZipOp>,
     *   value: int,
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
