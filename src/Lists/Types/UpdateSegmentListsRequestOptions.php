<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Types\SegmentTypeItem;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * The [conditions of the segment](https://mailchimp.com/help/save-and-manage-segments/). Static and fuzzy segments don't have conditions.
 */
class UpdateSegmentListsRequestOptions extends JsonSerializableType
{
    /**
     * @var ?array<SegmentTypeItem> $conditions
     */
    #[JsonProperty('conditions'), ArrayType([SegmentTypeItem::class])]
    public ?array $conditions;

    /**
     * @var ?value-of<UpdateSegmentListsRequestOptionsMatch> $match Match type.
     */
    #[JsonProperty('match')]
    public ?string $match;

    /**
     * @param array{
     *   conditions?: ?array<SegmentTypeItem>,
     *   match?: ?value-of<UpdateSegmentListsRequestOptionsMatch>,
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
