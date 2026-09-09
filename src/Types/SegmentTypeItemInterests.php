<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Segment by an interest group merge field.
 */
class SegmentTypeItemInterests extends JsonSerializableType
{
    /**
     * @var ?string $field Segmenting based on interest group information. This should start with 'interests-' followed by the grouping id. Ex. 'interests-123'.
     */
    #[JsonProperty('field')]
    public ?string $field;

    /**
     * @var ?value-of<SegmentTypeItemInterestsOp> $op Whether the member is a part of one, all, or none of the groups.
     */
    #[JsonProperty('op')]
    public ?string $op;

    /**
     * @var ?array<string> $value An array containing strings, each representing a group id.
     */
    #[JsonProperty('value'), ArrayType(['string'])]
    public ?array $value;

    /**
     * @param array{
     *   field?: ?string,
     *   op?: ?value-of<SegmentTypeItemInterestsOp>,
     *   value?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->field = $values['field'] ?? null;
        $this->op = $values['op'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
