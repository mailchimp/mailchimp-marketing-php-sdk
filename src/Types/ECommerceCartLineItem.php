<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Information about a specific cart line item.
 */
class ECommerceCartLineItem extends JsonSerializableType
{
    /**
     * @var ?array<ECommerceCartLineItemLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ECommerceCartLineItemLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $id A unique identifier for the cart line item.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?float $price The price of a cart line item.
     */
    #[JsonProperty('price')]
    public ?float $price;

    /**
     * @var ?string $productId A unique identifier for the product associated with the cart line item.
     */
    #[JsonProperty('product_id')]
    public ?string $productId;

    /**
     * @var ?string $productTitle The name of the product for the cart line item.
     */
    #[JsonProperty('product_title')]
    public ?string $productTitle;

    /**
     * @var ?string $productVariantId A unique identifier for the product variant associated with the cart line item.
     */
    #[JsonProperty('product_variant_id')]
    public ?string $productVariantId;

    /**
     * @var ?string $productVariantTitle The name of the product variant for the cart line item.
     */
    #[JsonProperty('product_variant_title')]
    public ?string $productVariantTitle;

    /**
     * @var ?int $quantity The quantity of a cart line item.
     */
    #[JsonProperty('quantity')]
    public ?int $quantity;

    /**
     * @param array{
     *   links?: ?array<ECommerceCartLineItemLinksItem>,
     *   id?: ?string,
     *   price?: ?float,
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
        $this->id = $values['id'] ?? null;
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
