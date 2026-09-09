<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

/**
 * Information about a specific order line.
 */
class UpdateStoreOrderEcommerceRequestLinesItem extends JsonSerializableType
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
     * @var ?string $id A unique identifier for the order line item.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var (
     *    float
     *   |string
     * )|null $price
     */
    #[JsonProperty('price'), Union('float', 'string', 'null')]
    public float|string|null $price;

    /**
     * @var ?string $productId A unique identifier for the product associated with the order line item.
     */
    #[JsonProperty('product_id')]
    public ?string $productId;

    /**
     * @var ?string $productVariantId A unique identifier for the product variant associated with the order line item.
     */
    #[JsonProperty('product_variant_id')]
    public ?string $productVariantId;

    /**
     * @var ?int $quantity The quantity of an order line item.
     */
    #[JsonProperty('quantity')]
    public ?int $quantity;

    /**
     * @param array{
     *   discount?: (
     *    float
     *   |string
     * )|null,
     *   id?: ?string,
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
        $this->discount = $values['discount'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->price = $values['price'] ?? null;
        $this->productId = $values['productId'] ?? null;
        $this->productVariantId = $values['productVariantId'] ?? null;
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
