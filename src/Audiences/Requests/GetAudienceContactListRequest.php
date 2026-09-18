<?php

namespace Mailchimp\Audiences\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use DateTime;
use Mailchimp\Audiences\Types\GetAudienceContactListRequestSortField;
use Mailchimp\Audiences\Types\GetAudienceContactListRequestSortDir;

class GetAudienceContactListRequest extends JsonSerializableType
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
     * @var ?string $cursor Paginate through a collection of records by setting the `cursor` parameter to a `next_cursor` attribute returned by a previous request. Default value fetches the first "page" of results.
     */
    public ?string $cursor;

    /**
     * @var ?DateTime $createdBefore Restricts the response to contacts created at or before the specified time (inclusive). Uses ISO 8601 format: 2025-04-23T15:41:36+00:00.
     */
    public ?DateTime $createdBefore;

    /**
     * @var ?DateTime $createdSince Restricts the response to contacts created after the specified time (exclusive). Uses ISO 8601 format: 2025-04-23T15:41:36+00:00.
     */
    public ?DateTime $createdSince;

    /**
     * @var ?DateTime $updatedBefore Restricts the response to contacts updated at or before the specified time (inclusive). Uses ISO 8601 format: 2025-04-23T15:41:36+00:00.
     */
    public ?DateTime $updatedBefore;

    /**
     * @var ?DateTime $updatedSince Restricts the response to contacts updated after the specified time (exclusive). Uses ISO 8601 format: 2025-04-23T15:41:36+00:00.
     */
    public ?DateTime $updatedSince;

    /**
     * @var ?value-of<GetAudienceContactListRequestSortField> $sortField Specifies the field to sort the returned contacts by.
     */
    public ?string $sortField;

    /**
     * @var ?value-of<GetAudienceContactListRequestSortDir> $sortDir Determines the order direction for sorted results.
     */
    public ?string $sortDir;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   count?: ?int,
     *   cursor?: ?string,
     *   createdBefore?: ?DateTime,
     *   createdSince?: ?DateTime,
     *   updatedBefore?: ?DateTime,
     *   updatedSince?: ?DateTime,
     *   sortField?: ?value-of<GetAudienceContactListRequestSortField>,
     *   sortDir?: ?value-of<GetAudienceContactListRequestSortDir>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->count = $values['count'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->createdBefore = $values['createdBefore'] ?? null;
        $this->createdSince = $values['createdSince'] ?? null;
        $this->updatedBefore = $values['updatedBefore'] ?? null;
        $this->updatedSince = $values['updatedSince'] ?? null;
        $this->sortField = $values['sortField'] ?? null;
        $this->sortDir = $values['sortDir'] ?? null;
    }
}
