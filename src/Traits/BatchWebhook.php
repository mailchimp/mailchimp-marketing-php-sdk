<?php

namespace Mailchimp\Traits;

use Mailchimp\Types\BatchWebhookLinksItemItem;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A webhook configured for batch status updates.
 *
 * @property ?array<array<BatchWebhookLinksItemItem>> $links
 * @property ?bool $enabled
 * @property ?string $id
 * @property ?bool $signingEnabled
 * @property ?string $url
 */
trait BatchWebhook
{
    /**
     * @var ?array<array<BatchWebhookLinksItemItem>> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([[BatchWebhookLinksItemItem::class]])]
    public ?array $links;

    /**
     * @var ?bool $enabled Whether the webhook receives requests or not.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?string $id A string that uniquely identifies this Batch Webhook.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $signingEnabled Whether outbound deliveries are HMAC-signed.
     */
    #[JsonProperty('signing_enabled')]
    public ?bool $signingEnabled;

    /**
     * @var ?string $url A valid URL for the Webhook.
     */
    #[JsonProperty('url')]
    public ?string $url;
}
