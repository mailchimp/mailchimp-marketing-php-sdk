<?php

namespace Mailchimp\FileManager\Requests;

use Mailchimp\Core\Json\JsonSerializableType;

class ListFoldersFileManagerRequest extends JsonSerializableType
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
     * @var ?int $count The number of records to return. Default value is 10. Maximum value is 1000
     */
    public ?int $count;

    /**
     * @var ?int $offset Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
     */
    public ?int $offset;

    /**
     * @var ?string $createdBy The Mailchimp account user who created the File Manager file.
     */
    public ?string $createdBy;

    /**
     * @var ?string $beforeCreatedAt Restrict the response to files created before the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $beforeCreatedAt;

    /**
     * @var ?string $sinceCreatedAt Restrict the response to files created after the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $sinceCreatedAt;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   count?: ?int,
     *   offset?: ?int,
     *   createdBy?: ?string,
     *   beforeCreatedAt?: ?string,
     *   sinceCreatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->count = $values['count'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->createdBy = $values['createdBy'] ?? null;
        $this->beforeCreatedAt = $values['beforeCreatedAt'] ?? null;
        $this->sinceCreatedAt = $values['sinceCreatedAt'] ?? null;
    }
}
