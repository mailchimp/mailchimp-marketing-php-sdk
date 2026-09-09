<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ECommerceCart;

/**
 * A collection of a store's carts.
 */
class ListStoreCartsEcommerceResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListStoreCartsEcommerceResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListStoreCartsEcommerceResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ECommerceCart> $carts An array of objects, each representing a cart.
     */
    #[JsonProperty('carts'), ArrayType([ECommerceCart::class])]
    public ?array $carts;

    /**
     * @var ?string $storeId The store id.
     */
    #[JsonProperty('store_id')]
    public ?string $storeId;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListStoreCartsEcommerceResponseLinksItem>,
     *   carts?: ?array<ECommerceCart>,
     *   storeId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->carts = $values['carts'] ?? null;
        $this->storeId = $values['storeId'] ?? null;
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
