<?php

namespace Mailchimp\Automations\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use DateTime;
use Mailchimp\Automations\Types\ListAutomationsRequestStatus;

class ListAutomationsRequest extends JsonSerializableType
{
    /**
     * @var ?int $count The number of records to return. Default value is 10. Maximum value is 1000
     */
    public ?int $count;

    /**
     * @var ?int $offset Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
     */
    public ?int $offset;

    /**
     * @var ?array<string> $fields A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     */
    public ?array $fields;

    /**
     * @var ?array<string> $excludeFields A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     */
    public ?array $excludeFields;

    /**
     * @var ?DateTime $beforeCreateTime Restrict the response to automations created before this time. Uses the ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?DateTime $beforeCreateTime;

    /**
     * @var ?DateTime $sinceCreateTime Restrict the response to automations created after this time. Uses the ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?DateTime $sinceCreateTime;

    /**
     * @var ?DateTime $beforeStartTime Restrict the response to automations started before this time. Uses the ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?DateTime $beforeStartTime;

    /**
     * @var ?DateTime $sinceStartTime Restrict the response to automations started after this time. Uses the ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?DateTime $sinceStartTime;

    /**
     * @var ?value-of<ListAutomationsRequestStatus> $status Restrict the results to automations with the specified status.
     */
    public ?string $status;

    /**
     * @param array{
     *   count?: ?int,
     *   offset?: ?int,
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   beforeCreateTime?: ?DateTime,
     *   sinceCreateTime?: ?DateTime,
     *   beforeStartTime?: ?DateTime,
     *   sinceStartTime?: ?DateTime,
     *   status?: ?value-of<ListAutomationsRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->count = $values['count'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->beforeCreateTime = $values['beforeCreateTime'] ?? null;
        $this->sinceCreateTime = $values['sinceCreateTime'] ?? null;
        $this->beforeStartTime = $values['beforeStartTime'] ?? null;
        $this->sinceStartTime = $values['sinceStartTime'] ?? null;
        $this->status = $values['status'] ?? null;
    }
}
