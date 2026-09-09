<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The possible sources of any events that can trigger the webhook and whether they are enabled.
 */
class ListWebhooksSources extends JsonSerializableType
{
    /**
     * @var ?bool $admin Whether the webhook is triggered by admin-initiated actions in the web interface.
     */
    #[JsonProperty('admin')]
    public ?bool $admin;

    /**
     * @var ?bool $api Whether the webhook is triggered by actions initiated via the API.
     */
    #[JsonProperty('api')]
    public ?bool $api;

    /**
     * @var ?bool $user Whether the webhook is triggered by subscriber-initiated actions.
     */
    #[JsonProperty('user')]
    public ?bool $user;

    /**
     * @param array{
     *   admin?: ?bool,
     *   api?: ?bool,
     *   user?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->admin = $values['admin'] ?? null;
        $this->api = $values['api'] ?? null;
        $this->user = $values['user'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
