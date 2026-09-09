<?php

namespace Mailchimp\BatchWebhooks\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\BatchWebhook;

/**
 * Manage webhooks for batch requests.
 */
class ListBatchWebhooksResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListBatchWebhooksResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListBatchWebhooksResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @var ?array<BatchWebhook> $webhooks An array of objects, each representing a Batch Webhook.
     */
    #[JsonProperty('webhooks'), ArrayType([BatchWebhook::class])]
    public ?array $webhooks;

    /**
     * @param array{
     *   links?: ?array<ListBatchWebhooksResponseLinksItem>,
     *   totalItems?: ?int,
     *   webhooks?: ?array<BatchWebhook>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
        $this->webhooks = $values['webhooks'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
