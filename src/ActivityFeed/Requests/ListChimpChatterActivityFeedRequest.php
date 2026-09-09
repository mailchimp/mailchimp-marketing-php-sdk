<?php

namespace Mailchimp\ActivityFeed\Requests;

use Mailchimp\Core\Json\JsonSerializableType;

class ListChimpChatterActivityFeedRequest extends JsonSerializableType
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
     * @param array{
     *   count?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->count = $values['count'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
