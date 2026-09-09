<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ECommerceProductVariant;

/**
 * A collection of a product's variants.
 */
class ListStoreProductVariantsEcommerceResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListStoreProductVariantsEcommerceResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListStoreProductVariantsEcommerceResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $productId The product id.
     */
    #[JsonProperty('product_id')]
    public ?string $productId;

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
     * @var ?array<ECommerceProductVariant> $variants An array of objects, each representing a product's variants.
     */
    #[JsonProperty('variants'), ArrayType([ECommerceProductVariant::class])]
    public ?array $variants;

    /**
     * @param array{
     *   links?: ?array<ListStoreProductVariantsEcommerceResponseLinksItem>,
     *   productId?: ?string,
     *   storeId?: ?string,
     *   totalItems?: ?int,
     *   variants?: ?array<ECommerceProductVariant>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->productId = $values['productId'] ?? null;
        $this->storeId = $values['storeId'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
        $this->variants = $values['variants'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
