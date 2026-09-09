<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Configure a webhook for the given list.
 */
class AddWebhook extends JsonSerializableType
{
    /**
     * @var ?AddWebhookEvents $events The events that can trigger the webhook and whether they are enabled.
     */
    #[JsonProperty('events')]
    public ?AddWebhookEvents $events;

    /**
     * @var ?AddWebhookSources $sources The possible sources of any events that can trigger the webhook and whether they are enabled.
     */
    #[JsonProperty('sources')]
    public ?AddWebhookSources $sources;

    /**
     * @var ?string $url A valid URL for the Webhook.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   events?: ?AddWebhookEvents,
     *   sources?: ?AddWebhookSources,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->events = $values['events'] ?? null;
        $this->sources = $values['sources'] ?? null;
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
