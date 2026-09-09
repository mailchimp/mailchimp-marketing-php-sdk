<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by a specific geographic region.
 */
class SegmentTypeItemIpGeoIn extends JsonSerializableType
{
    /**
     * @var string $addr The address of the target location.
     */
    #[JsonProperty('addr')]
    public string $addr;

    /**
     * @var value-of<SegmentTypeItemIpGeoInField> $field Segmenting subscribers who are within a specific location.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var string $lat The latitude of the target location.
     */
    #[JsonProperty('lat')]
    public string $lat;

    /**
     * @var string $lng The longitude of the target location.
     */
    #[JsonProperty('lng')]
    public string $lng;

    /**
     * @var value-of<SegmentTypeItemIpGeoInOp> $op Segment members who are within a specific geographic region.
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
     *   addr: string,
     *   field: value-of<SegmentTypeItemIpGeoInField>,
     *   lat: string,
     *   lng: string,
     *   op: value-of<SegmentTypeItemIpGeoInOp>,
     *   value: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->addr = $values['addr'];
        $this->field = $values['field'];
        $this->lat = $values['lat'];
        $this->lng = $values['lng'];
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
