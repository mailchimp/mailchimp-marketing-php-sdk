<?php

namespace Mailchimp\Reports\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Reports\Types\ListReportsRequestType;
use DateTime;

class ListReportsRequest extends JsonSerializableType
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
     * @var ?value-of<ListReportsRequestType> $type The campaign type.
     */
    public ?string $type;

    /**
     * @var ?DateTime $beforeSendTime Restrict the response to campaigns sent before the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?DateTime $beforeSendTime;

    /**
     * @var ?DateTime $sinceSendTime Restrict the response to campaigns sent after the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?DateTime $sinceSendTime;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   count?: ?int,
     *   offset?: ?int,
     *   type?: ?value-of<ListReportsRequestType>,
     *   beforeSendTime?: ?DateTime,
     *   sinceSendTime?: ?DateTime,
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
        $this->beforeSendTime = $values['beforeSendTime'] ?? null;
        $this->sinceSendTime = $values['sinceSendTime'] ?? null;
    }
}
