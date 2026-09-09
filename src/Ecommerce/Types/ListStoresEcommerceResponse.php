<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ECommerceStore;

/**
 * A collection of stores in the account.
 */
class ListStoresEcommerceResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListStoresEcommerceResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListStoresEcommerceResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ECommerceStore> $stores An array of objects, each representing a store.
     */
    #[JsonProperty('stores'), ArrayType([ECommerceStore::class])]
    public ?array $stores;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListStoresEcommerceResponseLinksItem>,
     *   stores?: ?array<ECommerceStore>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->stores = $values['stores'] ?? null;
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
