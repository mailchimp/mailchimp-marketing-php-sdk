<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by a specific country or US state.
 */
class SegmentTypeItemIpGeoCountryState extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemIpGeoCountryStateField> $field Segmenting subscribers who are within a specific location.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemIpGeoCountryStateOp> $op Segment members who are within a specific country or US state.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var string $value The two-letter country code or US state abbreviation.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemIpGeoCountryStateField>,
     *   op: value-of<SegmentTypeItemIpGeoCountryStateOp>,
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
