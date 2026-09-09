<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * The last 50 member events for a list.
 */
class ListMemberActivityListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListMemberActivityListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListMemberActivityListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListMemberActivityListsResponseActivityItem> $activity An array of objects, each representing a member event.
     */
    #[JsonProperty('activity'), ArrayType([ListMemberActivityListsResponseActivityItem::class])]
    public ?array $activity;

    /**
     * @var ?string $contactId As Mailchimp evolves beyond email, you may eventually have contacts without email addresses. While the `email_id` is the MD5 hash of their email address, this `contact_id` is agnostic of contact’s inclusion of an email address.
     */
    #[JsonProperty('contact_id')]
    public ?string $contactId;

    /**
     * @var ?string $emailId The MD5 hash of the lowercase version of the list member's email address.
     */
    #[JsonProperty('email_id')]
    public ?string $emailId;

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
     *   links?: ?array<ListMemberActivityListsResponseLinksItem>,
     *   activity?: ?array<ListMemberActivityListsResponseActivityItem>,
     *   contactId?: ?string,
     *   emailId?: ?string,
     *   listId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->activity = $values['activity'] ?? null;
        $this->contactId = $values['contactId'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
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
