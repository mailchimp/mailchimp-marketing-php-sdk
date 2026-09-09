<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\MemberNotes;

/**
 * The last 10 notes for a specific list member, based on date created.
 */
class ListMemberNotesListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListMemberNotesListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListMemberNotesListsResponseLinksItem::class])]
    public ?array $links;

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
     * @var ?array<MemberNotes> $notes An array of objects, each representing a note resource.
     */
    #[JsonProperty('notes'), ArrayType([MemberNotes::class])]
    public ?array $notes;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListMemberNotesListsResponseLinksItem>,
     *   emailId?: ?string,
     *   listId?: ?string,
     *   notes?: ?array<MemberNotes>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->notes = $values['notes'] ?? null;
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
