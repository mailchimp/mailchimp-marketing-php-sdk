<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A webhook configured for batch status updates.
 */
class BatchWebhook extends JsonSerializableType
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
     * @var ?string $signingSecret The HMAC signing secret. Returned exactly once at creation. This should be stored securely; if lost, delete and recreate the webhook to obtain a new secret.
     */
    #[JsonProperty('signing_secret')]
    public ?string $signingSecret;

    /**
     * @var ?string $url A valid URL for the Webhook.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   links?: ?array<array<BatchWebhookLinksItemItem>>,
     *   enabled?: ?bool,
     *   id?: ?string,
     *   signingEnabled?: ?bool,
     *   signingSecret?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->signingEnabled = $values['signingEnabled'] ?? null;
        $this->signingSecret = $values['signingSecret'] ?? null;
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
