<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * The conditions of the segment. Static segments (tags) and fuzzy segments don't have conditions.
 */
class ListOptions extends JsonSerializableType
{
    /**
     * @var ?array<SegmentTypeItem> $conditions
     */
    #[JsonProperty('conditions'), ArrayType([SegmentTypeItem::class])]
    public ?array $conditions;

    /**
     * @var ?value-of<ListOptionsMatch> $match Match type.
     */
    #[JsonProperty('match')]
    public ?string $match;

    /**
     * @param array{
     *   conditions?: ?array<SegmentTypeItem>,
     *   match?: ?value-of<ListOptionsMatch>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->conditions = $values['conditions'] ?? null;
        $this->match = $values['match'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
