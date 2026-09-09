<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ListsSegmentsMembers;

/**
 * View members in a specific list segment.
 */
class ListSegmentMembersListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListSegmentMembersListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListSegmentMembersListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListsSegmentsMembers> $members An array of objects, each representing a specific list member.
     */
    #[JsonProperty('members'), ArrayType([ListsSegmentsMembers::class])]
    public ?array $members;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListSegmentMembersListsResponseLinksItem>,
     *   members?: ?array<ListsSegmentsMembers>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->members = $values['members'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
