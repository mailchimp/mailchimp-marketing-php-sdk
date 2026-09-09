<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;

class GetMergeFieldListsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $excludeFields A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     */
    public ?array $excludeFields;

    /**
     * @var ?array<string> $fields A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     */
    public ?array $fields;

    /**
     * @param array{
     *   excludeFields?: ?array<string>,
     *   fields?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->fields = $values['fields'] ?? null;
    }
}
