<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

/**
 * Information about a specific product variant.
 */
class UpsertStoreProductEcommerceRequestVariantsItem extends JsonSerializableType
{
    /**
     * @var ?string $backorders The backorders of a product variant.
     */
    #[JsonProperty('backorders')]
    public ?string $backorders;

    /**
     * @var (
     *    string
     *   |int
     * ) $id A unique identifier for the product variant.
     */
    #[JsonProperty('id'), Union('string', 'integer')]
    public string|int $id;

    /**
     * @var ?string $imageUrl The image URL for a product variant.
     */
    #[JsonProperty('image_url')]
    public ?string $imageUrl;

    /**
     * @var ?int $inventoryQuantity The inventory quantity of a product variant.
     */
    #[JsonProperty('inventory_quantity')]
    public ?int $inventoryQuantity;

    /**
     * @var (
     *    float
     *   |string
     * )|null $price
     */
    #[JsonProperty('price'), Union('float', 'string', 'null')]
    public float|string|null $price;

    /**
     * @var ?string $sku The stock keeping unit (SKU) of a product variant.
     */
    #[JsonProperty('sku')]
    public ?string $sku;

    /**
     * @var string $title The title of a product variant.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var ?string $url The URL for a product variant.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?string $visibility The visibility of a product variant.
     */
    #[JsonProperty('visibility')]
    public ?string $visibility;

    /**
     * @param array{
     *   id: (
     *    string
     *   |int
     * ),
     *   title: string,
     *   backorders?: ?string,
     *   imageUrl?: ?string,
     *   inventoryQuantity?: ?int,
     *   price?: (
     *    float
     *   |string
     * )|null,
     *   sku?: ?string,
     *   url?: ?string,
     *   visibility?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->backorders = $values['backorders'] ?? null;
        $this->id = $values['id'];
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->inventoryQuantity = $values['inventoryQuantity'] ?? null;
        $this->price = $values['price'] ?? null;
        $this->sku = $values['sku'] ?? null;
        $this->title = $values['title'];
        $this->url = $values['url'] ?? null;
        $this->visibility = $values['visibility'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
