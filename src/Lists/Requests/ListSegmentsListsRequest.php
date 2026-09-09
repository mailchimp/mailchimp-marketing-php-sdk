<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Lists\Types\ListSegmentsListsRequestExcludeType;

class ListSegmentsListsRequest extends JsonSerializableType
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
     * @var ?string $type Limit results based on segment type.
     */
    public ?string $type;

    /**
     * @var ?string $sinceCreatedAt Restrict results to segments created after the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $sinceCreatedAt;

    /**
     * @var ?string $beforeCreatedAt Restrict results to segments created before the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $beforeCreatedAt;

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
     * @var ?string $sinceUpdatedAt Restrict results to segments update after the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $sinceUpdatedAt;

    /**
     * @var ?string $beforeUpdatedAt Restrict results to segments update before the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $beforeUpdatedAt;

    /**
     * @var ?value-of<ListSegmentsListsRequestExcludeType> $excludeType Exclude results based on segment type. For example, use `exclude_type=static` to exclude tags from the response.
     */
    public ?string $excludeType;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   count?: ?int,
     *   offset?: ?int,
     *   type?: ?string,
     *   sinceCreatedAt?: ?string,
     *   beforeCreatedAt?: ?string,
     *   includeCleaned?: ?bool,
     *   includeTransactional?: ?bool,
     *   includeUnsubscribed?: ?bool,
     *   sinceUpdatedAt?: ?string,
     *   beforeUpdatedAt?: ?string,
     *   excludeType?: ?value-of<ListSegmentsListsRequestExcludeType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->count = $values['count'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->sinceCreatedAt = $values['sinceCreatedAt'] ?? null;
        $this->beforeCreatedAt = $values['beforeCreatedAt'] ?? null;
        $this->includeCleaned = $values['includeCleaned'] ?? null;
        $this->includeTransactional = $values['includeTransactional'] ?? null;
        $this->includeUnsubscribed = $values['includeUnsubscribed'] ?? null;
        $this->sinceUpdatedAt = $values['sinceUpdatedAt'] ?? null;
        $this->beforeUpdatedAt = $values['beforeUpdatedAt'] ?? null;
        $this->excludeType = $values['excludeType'] ?? null;
    }
}
