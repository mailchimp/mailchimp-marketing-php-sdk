<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

/**
 * Information about a specific cart line item.
 */
class CreateStoreCartEcommerceRequestLinesItem extends JsonSerializableType
{
    /**
     * @var string $id A unique identifier for the cart line item.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var (
     *    float
     *   |string
     * ) $price
     */
    #[JsonProperty('price'), Union('float', 'string')]
    public float|string $price;

    /**
     * @var string $productId A unique identifier for the product associated with the cart line item.
     */
    #[JsonProperty('product_id')]
    public string $productId;

    /**
     * @var string $productVariantId A unique identifier for the product variant associated with the cart line item.
     */
    #[JsonProperty('product_variant_id')]
    public string $productVariantId;

    /**
     * @var int $quantity The quantity of a cart line item.
     */
    #[JsonProperty('quantity')]
    public int $quantity;

    /**
     * @param array{
     *   id: string,
     *   price: (
     *    float
     *   |string
     * ),
     *   productId: string,
     *   productVariantId: string,
     *   quantity: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->price = $values['price'];
        $this->productId = $values['productId'];
        $this->productVariantId = $values['productVariantId'];
        $this->quantity = $values['quantity'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
