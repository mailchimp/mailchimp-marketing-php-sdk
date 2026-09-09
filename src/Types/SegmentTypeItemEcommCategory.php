<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by purchases in specific items or categories.
 */
class SegmentTypeItemEcommCategory extends JsonSerializableType
{
    /**
     * @var ?value-of<SegmentTypeItemEcommCategoryField> $field Segment by purchases in specific items or categories.
     */
    #[JsonProperty('field')]
    public ?string $field;

    /**
     * @var ?value-of<SegmentTypeItemEcommCategoryOp> $op A member who has purchased from a category/specific item that is/is not a specific name, where the category/item name contains/doesn't contain a specific phrase or string, or a category/item name that starts/ends with a string.
     */
    #[JsonProperty('op')]
    public ?string $op;

    /**
     * @var ?string $value The ecommerce category/item information.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   field?: ?value-of<SegmentTypeItemEcommCategoryField>,
     *   op?: ?value-of<SegmentTypeItemEcommCategoryOp>,
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
