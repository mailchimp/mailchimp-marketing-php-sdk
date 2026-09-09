<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;
use Mailchimp\Types\EcommerceStoresOrdersPost;

class CreateStoreOrderLineEcommerceRequest extends JsonSerializableType
{
    /**
     * @var (
     *    float
     *   |string
     * )|null $discount
     */
    #[JsonProperty('discount'), Union('float', 'string', 'null')]
    public float|string|null $discount;

    /**
     * @var string $id A unique identifier for the order line item.
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
     * @var ?EcommerceStoresOrdersPost $product
     */
    #[JsonProperty('product')]
    public ?EcommerceStoresOrdersPost $product;

    /**
     * @var string $productId A unique identifier for the product associated with the order line item.
     */
    #[JsonProperty('product_id')]
    public string $productId;

    /**
     * @var string $productVariantId A unique identifier for the product variant associated with the order line item.
     */
    #[JsonProperty('product_variant_id')]
    public string $productVariantId;

    /**
     * @var int $quantity The quantity of an order line item.
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
     *   discount?: (
     *    float
     *   |string
     * )|null,
     *   product?: ?EcommerceStoresOrdersPost,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->discount = $values['discount'] ?? null;
        $this->id = $values['id'];
        $this->price = $values['price'];
        $this->product = $values['product'] ?? null;
        $this->productId = $values['productId'];
        $this->productVariantId = $values['productVariantId'];
        $this->quantity = $values['quantity'];
    }
}
