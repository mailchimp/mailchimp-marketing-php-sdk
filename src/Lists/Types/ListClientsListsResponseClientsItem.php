<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The email client.
 */
class ListClientsListsResponseClientsItem extends JsonSerializableType
{
    /**
     * @var ?string $client The name of the email client.
     */
    #[JsonProperty('client')]
    public ?string $client;

    /**
     * @var ?int $members The number of subscribed members who used this email client.
     */
    #[JsonProperty('members')]
    public ?int $members;

    /**
     * @param array{
     *   client?: ?string,
     *   members?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->client = $values['client'] ?? null;
        $this->members = $values['members'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
