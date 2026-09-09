<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A summary of the interaction with the campaign.
 */
class OpenActivityOpensItem extends JsonSerializableType
{
    /**
     * @var ?bool $isProxyOpen Indicates if the open was from an email client that use proxies.
     */
    #[JsonProperty('is_proxy_open')]
    public ?bool $isProxyOpen;

    /**
     * @var ?DateTime $timestamp The date and time recorded for the action in ISO 8601 format.
     */
    #[JsonProperty('timestamp'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $timestamp;

    /**
     * @param array{
     *   isProxyOpen?: ?bool,
     *   timestamp?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->isProxyOpen = $values['isProxyOpen'] ?? null;
        $this->timestamp = $values['timestamp'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
