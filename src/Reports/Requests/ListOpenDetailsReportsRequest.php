<?php

namespace Mailchimp\Reports\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Reports\Types\ListOpenDetailsReportsRequestSortField;
use Mailchimp\Reports\Types\ListOpenDetailsReportsRequestSortDir;

class ListOpenDetailsReportsRequest extends JsonSerializableType
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
     * @var ?string $since Restrict results to campaign open events that occur after a specific time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $since;

    /**
     * @var ?value-of<ListOpenDetailsReportsRequestSortField> $sortField Returns open reports sorted by the specified field.
     */
    public ?string $sortField;

    /**
     * @var ?value-of<ListOpenDetailsReportsRequestSortDir> $sortDir Determines the order direction for sorted results.
     */
    public ?string $sortDir;

    /**
     * @var ?bool $filterBots When true, exclude automated (proxy/bot) opens so the returned open counts reflect human opens only, matching the in-app Recipient Activity view. A member whose opens are all automated is excluded from the human-only view. Defaults to false (all opens).
     */
    public ?bool $filterBots;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   count?: ?int,
     *   offset?: ?int,
     *   since?: ?string,
     *   sortField?: ?value-of<ListOpenDetailsReportsRequestSortField>,
     *   sortDir?: ?value-of<ListOpenDetailsReportsRequestSortDir>,
     *   filterBots?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->count = $values['count'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->since = $values['since'] ?? null;
        $this->sortField = $values['sortField'] ?? null;
        $this->sortDir = $values['sortDir'] ?? null;
        $this->filterBots = $values['filterBots'] ?? null;
    }
}
