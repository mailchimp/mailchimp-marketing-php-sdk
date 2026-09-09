<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A summary of the interaction with the campaign.
 */
class EmailActivityActivityItem extends JsonSerializableType
{
    /**
     * @var ?string $action One of the following actions: 'open', 'click', or 'bounce'
     */
    #[JsonProperty('action')]
    public ?string $action;

    /**
     * @var ?string $ip The IP address recorded for the action.
     */
    #[JsonProperty('ip')]
    public ?string $ip;

    /**
     * @var ?DateTime $timestamp The date and time recorded for the action in ISO 8601 format.
     */
    #[JsonProperty('timestamp'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $timestamp;

    /**
     * @var ?string $type If the action is a 'bounce', the type of bounce received: 'hard', 'soft'.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $url If the action is a 'click', the URL on which the member clicked.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   action?: ?string,
     *   ip?: ?string,
     *   timestamp?: ?DateTime,
     *   type?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->action = $values['action'] ?? null;
        $this->ip = $values['ip'] ?? null;
        $this->timestamp = $values['timestamp'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
