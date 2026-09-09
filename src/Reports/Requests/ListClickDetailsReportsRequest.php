<?php

namespace Mailchimp\Reports\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Reports\Types\ListClickDetailsReportsRequestSortField;
use Mailchimp\Reports\Types\ListClickDetailsReportsRequestSortDir;

class ListClickDetailsReportsRequest extends JsonSerializableType
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
     * @var ?value-of<ListClickDetailsReportsRequestSortField> $sortField Returns click reports sorted by the specified field.
     */
    public ?string $sortField;

    /**
     * @var ?value-of<ListClickDetailsReportsRequestSortDir> $sortDir Determines the order direction for sorted results.
     */
    public ?string $sortDir;

    /**
     * @var ?bool $filterBots When true, exclude automated bot clicks so the returned click counts reflect human clicks only, matching the in-app Recipient Activity view. Filtering changes a link's counts, but never removes a link from the response. Defaults to false (all clicks).
     */
    public ?bool $filterBots;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   count?: ?int,
     *   offset?: ?int,
     *   sortField?: ?value-of<ListClickDetailsReportsRequestSortField>,
     *   sortDir?: ?value-of<ListClickDetailsReportsRequestSortDir>,
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
        $this->sortField = $values['sortField'] ?? null;
        $this->sortDir = $values['sortDir'] ?? null;
        $this->filterBots = $values['filterBots'] ?? null;
    }
}
