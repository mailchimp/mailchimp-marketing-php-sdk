<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateListSurveyActionReplicateListsRequest extends JsonSerializableType
{
    /**
     * @var ?string $title The title for the replicated survey.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $listId The unique ID of the audience for the replicated survey. Defaults to the source survey audience.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @param array{
     *   title?: ?string,
     *   listId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->title = $values['title'] ?? null;
        $this->listId = $values['listId'] ?? null;
    }
}
