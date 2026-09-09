<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateSegmentMemberListsRequest extends JsonSerializableType
{
    /**
     * @var string $emailAddress Email address for a subscriber.
     */
    #[JsonProperty('email_address')]
    public string $emailAddress;

    /**
     * @param array{
     *   emailAddress: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->emailAddress = $values['emailAddress'];
    }
}
