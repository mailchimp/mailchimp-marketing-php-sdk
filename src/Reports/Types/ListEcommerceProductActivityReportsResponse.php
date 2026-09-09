<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A collection of ecommerce products.
 */
class ListEcommerceProductActivityReportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListEcommerceProductActivityReportsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListEcommerceProductActivityReportsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListEcommerceProductActivityReportsResponseProductsItem> $products
     */
    #[JsonProperty('products'), ArrayType([ListEcommerceProductActivityReportsResponseProductsItem::class])]
    public ?array $products;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListEcommerceProductActivityReportsResponseLinksItem>,
     *   products?: ?array<ListEcommerceProductActivityReportsResponseProductsItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->products = $values['products'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
