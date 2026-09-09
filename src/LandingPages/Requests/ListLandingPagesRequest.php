<?php

namespace Mailchimp\LandingPages\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\LandingPages\Types\ListLandingPagesRequestSortDir;
use Mailchimp\LandingPages\Types\ListLandingPagesRequestSortField;

class ListLandingPagesRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ListLandingPagesRequestSortDir> $sortDir Determines the order direction for sorted results.
     */
    public ?string $sortDir;

    /**
     * @var ?value-of<ListLandingPagesRequestSortField> $sortField Returns files sorted by the specified field.
     */
    public ?string $sortField;

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
     * @param array{
     *   sortDir?: ?value-of<ListLandingPagesRequestSortDir>,
     *   sortField?: ?value-of<ListLandingPagesRequestSortField>,
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   count?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sortDir = $values['sortDir'] ?? null;
        $this->sortField = $values['sortField'] ?? null;
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->count = $values['count'] ?? null;
    }
}
