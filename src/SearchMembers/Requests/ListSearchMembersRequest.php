<?php

namespace Mailchimp\SearchMembers\Requests;

use Mailchimp\Core\Json\JsonSerializableType;

class ListSearchMembersRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $fields A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     */
    public ?array $fields;

    /**
     * @var ?array<string> $excludeFields A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     */
    public ?array $excludeFields;

    /**
     * @var string $query The search query used to filter results. Query should be a valid email, or a string representing a contact's first or last name.
     */
    public string $query;

    /**
     * @var ?string $listId The unique id for the list.
     */
    public ?string $listId;

    /**
     * @param array{
     *   query: string,
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   listId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->query = $values['query'];
        $this->listId = $values['listId'] ?? null;
    }
}
