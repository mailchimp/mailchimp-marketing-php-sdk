<?php

namespace Mailchimp\Reports\Requests;

use Mailchimp\Core\Json\JsonSerializableType;

class ListEmailActivityReportsRequest extends JsonSerializableType
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
     * @var ?string $since Restrict results to email activity events that occur after a specific time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $since;

    /**
     * @var ?bool $filterBots When true, exclude automated bot and Apple Mail Privacy Protection (MPP) proxy activity so the returned activity reflects human-only opens and clicks, matching the in-app Recipient Activity view. Filtering removes events from a member's activity, but never removes the member from the response. Defaults to false (all activity).
     */
    public ?bool $filterBots;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   count?: ?int,
     *   offset?: ?int,
     *   since?: ?string,
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
        $this->filterBots = $values['filterBots'] ?? null;
    }
}
