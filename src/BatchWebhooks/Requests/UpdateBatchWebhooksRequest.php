<?php

namespace Mailchimp\BatchWebhooks\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class UpdateBatchWebhooksRequest extends JsonSerializableType
{
    /**
     * @var ?bool $enabled Whether the webhook receives requests or not.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?string $url A valid URL for the Webhook.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   enabled?: ?bool,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enabled = $values['enabled'] ?? null;
        $this->url = $values['url'] ?? null;
    }
}
