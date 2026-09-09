<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Information about a specific product.
 */
class ECommerceProduct extends JsonSerializableType
{
    /**
     * @var ?array<ECommerceProductLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ECommerceProductLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $currencyCode The currency code
     */
    #[JsonProperty('currency_code')]
    public ?string $currencyCode;

    /**
     * @var ?string $description The description of a product.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $handle The handle of a product.
     */
    #[JsonProperty('handle')]
    public ?string $handle;

    /**
     * @var ?string $id A unique identifier for the product.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $imageUrl The image URL for a product.
     */
    #[JsonProperty('image_url')]
    public ?string $imageUrl;

    /**
     * @var ?array<ECommerceProductImagesItem> $images An array of the product's images.
     */
    #[JsonProperty('images'), ArrayType([ECommerceProductImagesItem::class])]
    public ?array $images;

    /**
     * @var ?DateTime $publishedAtForeign The date and time the product was published in ISO 8601 format.
     */
    #[JsonProperty('published_at_foreign'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $publishedAtForeign;

    /**
     * @var ?string $title The title of a product.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $type The type of product.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $url The URL for a product.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?array<ECommerceProductVariant> $variants Returns up to 50 of the product's variants. To retrieve all variants use [Product Variants](https://mailchimp.com/developer/marketing/api/ecommerce-product-variants/).
     */
    #[JsonProperty('variants'), ArrayType([ECommerceProductVariant::class])]
    public ?array $variants;

    /**
     * @var ?string $vendor The vendor for a product.
     */
    #[JsonProperty('vendor')]
    public ?string $vendor;

    /**
     * @param array{
     *   links?: ?array<ECommerceProductLinksItem>,
     *   currencyCode?: ?string,
     *   description?: ?string,
     *   handle?: ?string,
     *   id?: ?string,
     *   imageUrl?: ?string,
     *   images?: ?array<ECommerceProductImagesItem>,
     *   publishedAtForeign?: ?DateTime,
     *   title?: ?string,
     *   type?: ?string,
     *   url?: ?string,
     *   variants?: ?array<ECommerceProductVariant>,
     *   vendor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->currencyCode = $values['currencyCode'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->handle = $values['handle'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->images = $values['images'] ?? null;
        $this->publishedAtForeign = $values['publishedAtForeign'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->variants = $values['variants'] ?? null;
        $this->vendor = $values['vendor'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
