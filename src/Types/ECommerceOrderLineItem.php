<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Core\Types\Union;

/**
 * Information about a specific order line.
 */
class ECommerceOrderLineItem extends JsonSerializableType
{
    /**
     * @var ?array<ECommerceOrderLineItemLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ECommerceOrderLineItemLinksItem::class])]
    public ?array $links;

    /**
     * @var ?float $discount The total discount amount applied to a line item.
     */
    #[JsonProperty('discount')]
    public ?float $discount;

    /**
     * @var ?string $id A unique identifier for an order line item.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $imageUrl The image URL for a product.
     */
    #[JsonProperty('image_url')]
    public ?string $imageUrl;

    /**
     * @var (
     *    float
     *   |string
     * )|null $price
     */
    #[JsonProperty('price'), Union('float', 'string', 'null')]
    public float|string|null $price;

    /**
     * @var ?string $productId A unique identifier for the product associated with an order line item.
     */
    #[JsonProperty('product_id')]
    public ?string $productId;

    /**
     * @var ?string $productTitle The name of the product for an order line item.
     */
    #[JsonProperty('product_title')]
    public ?string $productTitle;

    /**
     * @var ?string $productVariantId A unique identifier for the product variant associated with an order line item.
     */
    #[JsonProperty('product_variant_id')]
    public ?string $productVariantId;

    /**
     * @var ?string $productVariantTitle The name of the product variant for an order line item.
     */
    #[JsonProperty('product_variant_title')]
    public ?string $productVariantTitle;

    /**
     * @var ?int $quantity The order line item quantity.
     */
    #[JsonProperty('quantity')]
    public ?int $quantity;

    /**
     * @param array{
     *   links?: ?array<ECommerceOrderLineItemLinksItem>,
     *   discount?: ?float,
     *   id?: ?string,
     *   imageUrl?: ?string,
     *   price?: (
     *    float
     *   |string
     * )|null,
     *   productId?: ?string,
     *   productTitle?: ?string,
     *   productVariantId?: ?string,
     *   productVariantTitle?: ?string,
     *   quantity?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->discount = $values['discount'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->price = $values['price'] ?? null;
        $this->productId = $values['productId'] ?? null;
        $this->productTitle = $values['productTitle'] ?? null;
        $this->productVariantId = $values['productVariantId'] ?? null;
        $this->productVariantTitle = $values['productVariantTitle'] ?? null;
        $this->quantity = $values['quantity'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
