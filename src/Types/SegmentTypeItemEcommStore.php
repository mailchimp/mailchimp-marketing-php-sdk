<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by purchases from a specific store.
 */
class SegmentTypeItemEcommStore extends JsonSerializableType
{
    /**
     * @var ?value-of<SegmentTypeItemEcommStoreField> $field Segment by purchases from a specific store.
     */
    #[JsonProperty('field')]
    public ?string $field;

    /**
     * @var ?value-of<SegmentTypeItemEcommStoreOp> $op Members who have or have not purchased from a specific store.
     */
    #[JsonProperty('op')]
    public ?string $op;

    /**
     * @var ?string $value The store id to segment against.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   field?: ?value-of<SegmentTypeItemEcommStoreField>,
     *   op?: ?value-of<SegmentTypeItemEcommStoreOp>,
     *   value?: ?string,
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
