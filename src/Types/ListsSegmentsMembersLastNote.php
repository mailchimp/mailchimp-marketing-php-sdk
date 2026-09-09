<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use DateTime;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Date;

/**
 * The most recent Note added about this member.
 */
class ListsSegmentsMembersLastNote extends JsonSerializableType
{
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
     * @var ?string $note The content of the note.
     */
    #[JsonProperty('note')]
    public ?string $note;

    /**
     * @var ?int $noteId The note id.
     */
    #[JsonProperty('note_id')]
    public ?int $noteId;

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   createdBy?: ?string,
     *   note?: ?string,
     *   noteId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->createdBy = $values['createdBy'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->noteId = $values['noteId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
