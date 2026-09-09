<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ListWebhooks;

/**
 * Manage webhooks for a specific list.
 */
class ListWebhooksListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListWebhooksListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListWebhooksListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $listId The list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @var ?array<ListWebhooks> $webhooks An array of objects, each representing a specific list member.
     */
    #[JsonProperty('webhooks'), ArrayType([ListWebhooks::class])]
    public ?array $webhooks;

    /**
     * @param array{
     *   links?: ?array<ListWebhooksListsResponseLinksItem>,
     *   listId?: ?string,
     *   totalItems?: ?int,
     *   webhooks?: ?array<ListWebhooks>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->listId = $values['listId'] ?? null;
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
