<?php

namespace Mailchimp\Traits;

use Mailchimp\Types\ListWebhooksLinksItem;
use Mailchimp\Types\ListWebhooksEvents;
use Mailchimp\Types\ListWebhooksSources;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Webhook configured for the given list.
 *
 * @property ?array<ListWebhooksLinksItem> $links
 * @property ?ListWebhooksEvents $events
 * @property ?string $id
 * @property ?string $listId
 * @property ?bool $signingEnabled
 * @property ?ListWebhooksSources $sources
 * @property ?string $url
 */
trait ListWebhooks
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
     * @var ?ListWebhooksSources $sources The possible sources of any events that can trigger the webhook and whether they are enabled.
     */
    #[JsonProperty('sources')]
    public ?ListWebhooksSources $sources;

    /**
     * @var ?string $url A valid URL for the Webhook.
     */
    #[JsonProperty('url')]
    public ?string $url;
}
