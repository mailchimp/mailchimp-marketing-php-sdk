<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Traits\ListWebhooks;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Types\ListWebhooksLinksItem;
use Mailchimp\Types\ListWebhooksEvents;
use Mailchimp\Types\ListWebhooksSources;

class CreateWebhookListsResponse extends JsonSerializableType
{
    use ListWebhooks;

    /**
     * @var ?string $signingSecret The HMAC signing secret. Returned exactly once at creation. This should be stored securely; if lost, delete and recreate the webhook to obtain a new secret.
     */
    #[JsonProperty('signing_secret')]
    public ?string $signingSecret;

    /**
     * @param array{
     *   links?: ?array<ListWebhooksLinksItem>,
     *   events?: ?ListWebhooksEvents,
     *   id?: ?string,
     *   listId?: ?string,
     *   signingEnabled?: ?bool,
     *   sources?: ?ListWebhooksSources,
     *   url?: ?string,
     *   signingSecret?: ?string,
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
        $this->sources = $values['sources'] ?? null;
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
