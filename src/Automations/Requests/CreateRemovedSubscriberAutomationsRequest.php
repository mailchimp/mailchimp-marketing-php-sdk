<?php

namespace Mailchimp\Automations\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateRemovedSubscriberAutomationsRequest extends JsonSerializableType
{
    /**
     * @var string $emailAddress The list member's email address.
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
