<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A collection of a product's images.
 */
class ListStoreProductImagesEcommerceResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListStoreProductImagesEcommerceResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListStoreProductImagesEcommerceResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListStoreProductImagesEcommerceResponseImagesItem> $images An array of objects, each representing a product image resource.
     */
    #[JsonProperty('images'), ArrayType([ListStoreProductImagesEcommerceResponseImagesItem::class])]
    public ?array $images;

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
     * @param array{
     *   links?: ?array<ListStoreProductImagesEcommerceResponseLinksItem>,
     *   images?: ?array<ListStoreProductImagesEcommerceResponseImagesItem>,
     *   productId?: ?string,
     *   storeId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->images = $values['images'] ?? null;
        $this->productId = $values['productId'] ?? null;
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
