<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ListMembers;

/**
 * Manage members of a specific Mailchimp list, including currently subscribed, unsubscribed, and bounced members.
 */
class ListMembersListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListMembersListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListMembersListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $listId The list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

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
     *   links?: ?array<ListMembersListsResponseLinksItem>,
     *   listId?: ?string,
     *   members?: ?array<ListMembers>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->listId = $values['listId'] ?? null;
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
