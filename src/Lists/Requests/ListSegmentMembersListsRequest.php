<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;

class ListSegmentMembersListsRequest extends JsonSerializableType
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
     * @var ?bool $includeCleaned Include cleaned members in response
     */
    public ?bool $includeCleaned;

    /**
     * @var ?bool $includeTransactional Include transactional members in response
     */
    public ?bool $includeTransactional;

    /**
     * @var ?bool $includeUnsubscribed Include unsubscribed members in response
     */
    public ?bool $includeUnsubscribed;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   count?: ?int,
     *   offset?: ?int,
     *   includeCleaned?: ?bool,
     *   includeTransactional?: ?bool,
     *   includeUnsubscribed?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->count = $values['count'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->includeCleaned = $values['includeCleaned'] ?? null;
        $this->includeTransactional = $values['includeTransactional'] ?? null;
        $this->includeUnsubscribed = $values['includeUnsubscribed'] ?? null;
    }
}
