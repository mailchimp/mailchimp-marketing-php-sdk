<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Information about a specific product image.
 */
class UpdateStoreProductImageEcommerceResponse extends JsonSerializableType
{
    /**
     * @var ?array<UpdateStoreProductImageEcommerceResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([UpdateStoreProductImageEcommerceResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $id A unique identifier for the product image.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $url The URL for a product image.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?array<string> $variantIds The list of product variants using the image.
     */
    #[JsonProperty('variant_ids'), ArrayType(['string'])]
    public ?array $variantIds;

    /**
     * @param array{
     *   links?: ?array<UpdateStoreProductImageEcommerceResponseLinksItem>,
     *   id?: ?string,
     *   url?: ?string,
     *   variantIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->variantIds = $values['variantIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
