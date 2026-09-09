<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * The last 50 Goal events for a member on a specific list.
 */
class ListMemberGoalsListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListMemberGoalsListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListMemberGoalsListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $emailId The MD5 hash of the lowercase version of the list member's email address.
     */
    #[JsonProperty('email_id')]
    public ?string $emailId;

    /**
     * @var ?array<ListMemberGoalsListsResponseGoalsItem> $goals The last 50 Goal events triggered by a member.
     */
    #[JsonProperty('goals'), ArrayType([ListMemberGoalsListsResponseGoalsItem::class])]
    public ?array $goals;

    /**
     * @var ?string $listId The list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListMemberGoalsListsResponseLinksItem>,
     *   emailId?: ?string,
     *   goals?: ?array<ListMemberGoalsListsResponseGoalsItem>,
     *   listId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->goals = $values['goals'] ?? null;
        $this->listId = $values['listId'] ?? null;
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
