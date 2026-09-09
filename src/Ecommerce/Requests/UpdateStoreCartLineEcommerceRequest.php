<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

class UpdateStoreCartLineEcommerceRequest extends JsonSerializableType
{
    /**
     * @var (
     *    float
     *   |string
     * )|null $price
     */
    #[JsonProperty('price'), Union('float', 'string', 'null')]
    public float|string|null $price;

    /**
     * @var ?string $productId A unique identifier for the product associated with the cart line item.
     */
    #[JsonProperty('product_id')]
    public ?string $productId;

    /**
     * @var ?string $productVariantId A unique identifier for the product variant associated with the cart line item.
     */
    #[JsonProperty('product_variant_id')]
    public ?string $productVariantId;

    /**
     * @var ?int $quantity The quantity of a cart line item.
     */
    #[JsonProperty('quantity')]
    public ?int $quantity;

    /**
     * @param array{
     *   price?: (
     *    float
     *   |string
     * )|null,
     *   productId?: ?string,
     *   productVariantId?: ?string,
     *   quantity?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->price = $values['price'] ?? null;
        $this->productId = $values['productId'] ?? null;
        $this->productVariantId = $values['productVariantId'] ?? null;
        $this->quantity = $values['quantity'] ?? null;
    }
}
