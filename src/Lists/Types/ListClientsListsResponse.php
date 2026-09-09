<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * The top email clients based on user-agent strings.
 */
class ListClientsListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListClientsListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListClientsListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListClientsListsResponseClientsItem> $clients An array of top email clients.
     */
    #[JsonProperty('clients'), ArrayType([ListClientsListsResponseClientsItem::class])]
    public ?array $clients;

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
     * @param array{
     *   links?: ?array<ListClientsListsResponseLinksItem>,
     *   clients?: ?array<ListClientsListsResponseClientsItem>,
     *   listId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->clients = $values['clients'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
