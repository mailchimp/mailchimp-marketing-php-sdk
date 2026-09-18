<?php

namespace Mailchimp\BatchWebhooks\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Traits\BatchWebhook;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Types\BatchWebhookLinksItemItem;

class CreateBatchWebhooksResponse extends JsonSerializableType
{
    use BatchWebhook;

    /**
     * @var ?string $signingSecret The HMAC signing secret. Returned exactly once at creation. This should be stored securely; if lost, delete and recreate the webhook to obtain a new secret.
     */
    #[JsonProperty('signing_secret')]
    public ?string $signingSecret;

    /**
     * @param array{
     *   links?: ?array<array<BatchWebhookLinksItemItem>>,
     *   enabled?: ?bool,
     *   id?: ?string,
     *   signingEnabled?: ?bool,
     *   url?: ?string,
     *   signingSecret?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->signingEnabled = $values['signingEnabled'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->signingSecret = $values['signingSecret'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
