<?php

namespace Mailchimp\BatchWebhooks\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateBatchWebhooksRequest extends JsonSerializableType
{
    /**
     * @var ?bool $enabled Whether the webhook receives requests or not.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var string $url A valid URL for the Webhook.
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   url: string,
     *   enabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->enabled = $values['enabled'] ?? null;
        $this->url = $values['url'];
    }
}
