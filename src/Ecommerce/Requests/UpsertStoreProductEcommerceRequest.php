<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;
use Mailchimp\Ecommerce\Types\UpsertStoreProductEcommerceRequestImagesItem;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Ecommerce\Types\UpsertStoreProductEcommerceRequestVariantsItem;

class UpsertStoreProductEcommerceRequest extends JsonSerializableType
{
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
     * @var (
     *    string
     *   |int
     * ) $id A unique identifier for the product.
     */
    #[JsonProperty('id'), Union('string', 'integer')]
    public string|int $id;

    /**
     * @var ?string $imageUrl The image URL for a product.
     */
    #[JsonProperty('image_url')]
    public ?string $imageUrl;

    /**
     * @var ?array<UpsertStoreProductEcommerceRequestImagesItem> $images An array of the product's images.
     */
    #[JsonProperty('images'), ArrayType([UpsertStoreProductEcommerceRequestImagesItem::class])]
    public ?array $images;

    /**
     * @var ?string $publishedAtForeign The date and time the product was published.
     */
    #[JsonProperty('published_at_foreign')]
    public ?string $publishedAtForeign;

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
     * @var ?array<UpsertStoreProductEcommerceRequestVariantsItem> $variants An array of the product's variants. At least one variant is required for each product. A variant can use the same `id` and `title` as the parent product.
     */
    #[JsonProperty('variants'), ArrayType([UpsertStoreProductEcommerceRequestVariantsItem::class])]
    public ?array $variants;

    /**
     * @var ?string $vendor The vendor for a product.
     */
    #[JsonProperty('vendor')]
    public ?string $vendor;

    /**
     * @param array{
     *   id: (
     *    string
     *   |int
     * ),
     *   description?: ?string,
     *   handle?: ?string,
     *   imageUrl?: ?string,
     *   images?: ?array<UpsertStoreProductEcommerceRequestImagesItem>,
     *   publishedAtForeign?: ?string,
     *   title?: ?string,
     *   type?: ?string,
     *   url?: ?string,
     *   variants?: ?array<UpsertStoreProductEcommerceRequestVariantsItem>,
     *   vendor?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->description = $values['description'] ?? null;
        $this->handle = $values['handle'] ?? null;
        $this->id = $values['id'];
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->images = $values['images'] ?? null;
        $this->publishedAtForeign = $values['publishedAtForeign'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->variants = $values['variants'] ?? null;
        $this->vendor = $values['vendor'] ?? null;
    }
}
