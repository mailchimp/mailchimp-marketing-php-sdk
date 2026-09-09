<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ECommerceProduct;

/**
 * A collection of a store's products.
 */
class ListStoreProductsEcommerceResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListStoreProductsEcommerceResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListStoreProductsEcommerceResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ECommerceProduct> $products An array of objects, each representing a store product.
     */
    #[JsonProperty('products'), ArrayType([ECommerceProduct::class])]
    public ?array $products;

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
     *   links?: ?array<ListStoreProductsEcommerceResponseLinksItem>,
     *   products?: ?array<ECommerceProduct>,
     *   storeId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->products = $values['products'] ?? null;
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
