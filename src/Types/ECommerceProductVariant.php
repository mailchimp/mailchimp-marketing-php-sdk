<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Information about a specific product variant.
 */
class ECommerceProductVariant extends JsonSerializableType
{
    /**
     * @var ?array<ECommerceProductVariantLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ECommerceProductVariantLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $backorders The backorders of a product variant.
     */
    #[JsonProperty('backorders')]
    public ?string $backorders;

    /**
     * @var ?DateTime $createdAt The date and time the product was created in ISO 8601 format.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $id A unique identifier for the product variant.
     */
    #[JsonProperty('id')]
    public ?string $id;

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
     * @var ?float $price The price of a product variant.
     */
    #[JsonProperty('price')]
    public ?float $price;

    /**
     * @var ?string $sku The stock keeping unit (SKU) of a product variant.
     */
    #[JsonProperty('sku')]
    public ?string $sku;

    /**
     * @var ?string $title The title of a product variant.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?DateTime $updatedAt The date and time the product was last updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

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
     *   links?: ?array<ECommerceProductVariantLinksItem>,
     *   backorders?: ?string,
     *   createdAt?: ?DateTime,
     *   id?: ?string,
     *   imageUrl?: ?string,
     *   inventoryQuantity?: ?int,
     *   price?: ?float,
     *   sku?: ?string,
     *   title?: ?string,
     *   updatedAt?: ?DateTime,
     *   url?: ?string,
     *   visibility?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->backorders = $values['backorders'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->inventoryQuantity = $values['inventoryQuantity'] ?? null;
        $this->price = $values['price'] ?? null;
        $this->sku = $values['sku'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
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
