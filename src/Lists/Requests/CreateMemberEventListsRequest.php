<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;
use Mailchimp\Core\Types\ArrayType;

class CreateMemberEventListsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $isSyncing Events created with the is_syncing value set to `true` will not trigger automations.
     */
    #[JsonProperty('is_syncing')]
    public ?bool $isSyncing;

    /**
     * @var string $name The name for this type of event ('purchased', 'visited', etc). Must be 2-30 characters in length
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?DateTime $occurredAt The date and time the event occurred in ISO 8601 format.
     */
    #[JsonProperty('occurred_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $occurredAt;

    /**
     * @var ?array<string, string> $properties An optional list of properties
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'string'])]
    public ?array $properties;

    /**
     * @param array{
     *   name: string,
     *   isSyncing?: ?bool,
     *   occurredAt?: ?DateTime,
     *   properties?: ?array<string, string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->isSyncing = $values['isSyncing'] ?? null;
        $this->name = $values['name'];
        $this->occurredAt = $values['occurredAt'] ?? null;
        $this->properties = $values['properties'] ?? null;
    }
}
