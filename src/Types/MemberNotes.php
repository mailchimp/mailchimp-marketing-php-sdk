<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A specific note for a specific member.
 */
class MemberNotes extends JsonSerializableType
{
    /**
     * @var ?array<MemberNotesLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([MemberNotesLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $contactId As Mailchimp evolves beyond email, you may eventually have contacts without email addresses. While the `email_id` is the MD5 hash of their email address, this `contact_id` is agnostic of contact’s inclusion of an email address.
     */
    #[JsonProperty('contact_id')]
    public ?string $contactId;

    /**
     * @var ?DateTime $createdAt The date and time the note was created in ISO 8601 format.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $createdBy The author of the note.
     */
    #[JsonProperty('created_by')]
    public ?string $createdBy;

    /**
     * @var ?string $emailId The MD5 hash of the lowercase version of the list member's email address.
     */
    #[JsonProperty('email_id')]
    public ?string $emailId;

    /**
     * @var ?int $id The note id.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $listId The unique id for the list.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?string $note The content of the note.
     */
    #[JsonProperty('note')]
    public ?string $note;

    /**
     * @var ?DateTime $updatedAt The date and time the note was last updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   links?: ?array<MemberNotesLinksItem>,
     *   contactId?: ?string,
     *   createdAt?: ?DateTime,
     *   createdBy?: ?string,
     *   emailId?: ?string,
     *   id?: ?int,
     *   listId?: ?string,
     *   note?: ?string,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->contactId = $values['contactId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->createdBy = $values['createdBy'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
