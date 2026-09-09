<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Webhook configured for the given list.
 */
class ListWebhooks extends JsonSerializableType
{
    /**
     * @var ?array<ListWebhooksLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListWebhooksLinksItem::class])]
    public ?array $links;

    /**
     * @var ?ListWebhooksEvents $events The events that can trigger the webhook and whether they are enabled.
     */
    #[JsonProperty('events')]
    public ?ListWebhooksEvents $events;

    /**
     * @var ?string $id An string that uniquely identifies this webhook.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $listId The unique id for the list.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?bool $signingEnabled Whether outbound deliveries are HMAC-signed.
     */
    #[JsonProperty('signing_enabled')]
    public ?bool $signingEnabled;

    /**
     * @var ?string $signingSecret The HMAC signing secret. Returned exactly once at creation. This should be stored securely; if lost, delete and recreate the webhook to obtain a new secret.
     */
    #[JsonProperty('signing_secret')]
    public ?string $signingSecret;

    /**
     * @var ?ListWebhooksSources $sources The possible sources of any events that can trigger the webhook and whether they are enabled.
     */
    #[JsonProperty('sources')]
    public ?ListWebhooksSources $sources;

    /**
     * @var ?string $url A valid URL for the Webhook.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   links?: ?array<ListWebhooksLinksItem>,
     *   events?: ?ListWebhooksEvents,
     *   id?: ?string,
     *   listId?: ?string,
     *   signingEnabled?: ?bool,
     *   signingSecret?: ?string,
     *   sources?: ?ListWebhooksSources,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->events = $values['events'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->signingEnabled = $values['signingEnabled'] ?? null;
        $this->signingSecret = $values['signingSecret'] ?? null;
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
