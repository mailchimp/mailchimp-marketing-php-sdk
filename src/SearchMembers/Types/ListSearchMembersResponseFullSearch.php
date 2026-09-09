<?php

namespace Mailchimp\SearchMembers\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Types\ListMembers;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Partial matches of the provided search query.
 */
class ListSearchMembersResponseFullSearch extends JsonSerializableType
{
    /**
     * @var ?array<ListMembers> $members An array of objects, each representing a specific list member.
     */
    #[JsonProperty('members'), ArrayType([ListMembers::class])]
    public ?array $members;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   members?: ?array<ListMembers>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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
