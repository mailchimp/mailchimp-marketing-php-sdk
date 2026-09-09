<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class UpdateMemberNoteListsRequest extends JsonSerializableType
{
    /**
     * @var ?string $note The content of the note. Note length is limited to 1,000 characters.
     */
    #[JsonProperty('note')]
    public ?string $note;

    /**
     * @param array{
     *   note?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->note = $values['note'] ?? null;
    }
}
