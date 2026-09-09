<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Core\Types\Union;

/**
 * Information about a specific product image.
 */
class UpdateStoreProductEcommerceRequestImagesItem extends JsonSerializableType
{
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
     * @var ?array<(
     *    string
     *   |int
     * )> $variantIds The list of product variants using the image.
     */
    #[JsonProperty('variant_ids'), ArrayType([new Union('string', 'integer')])]
    public ?array $variantIds;

    /**
     * @param array{
     *   id?: ?string,
     *   url?: ?string,
     *   variantIds?: ?array<(
     *    string
     *   |int
     * )>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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
