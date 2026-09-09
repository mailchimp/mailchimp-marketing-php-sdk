<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by an address-type merge field within a given distance.
 */
class SegmentTypeItemZipMerge extends JsonSerializableType
{
    /**
     * @var string $extra The city or the zip being used to segment against.
     */
    #[JsonProperty('extra')]
    public string $extra;

    /**
     * @var string $field An address or zip-type merge field to segment.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemZipMergeOp> $op Whether the member's address merge field is within a given distance from a city or zip.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var string $value The distance from the city/zip.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   extra: string,
     *   field: string,
     *   op: value-of<SegmentTypeItemZipMergeOp>,
     *   value: string,
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
