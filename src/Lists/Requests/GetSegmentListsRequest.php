<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;

class GetSegmentListsRequest extends JsonSerializableType
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
        $this->includeCleaned = $values['includeCleaned'] ?? null;
        $this->includeTransactional = $values['includeTransactional'] ?? null;
        $this->includeUnsubscribed = $values['includeUnsubscribed'] ?? null;
    }
}
