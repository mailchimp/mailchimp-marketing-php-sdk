<?php

namespace Mailchimp\Reporting\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A collection of ecommerce products.
 */
class ListFacebookAdEcommerceProductActivityReportingResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListFacebookAdEcommerceProductActivityReportingResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListFacebookAdEcommerceProductActivityReportingResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListFacebookAdEcommerceProductActivityReportingResponseProductsItem> $products
     */
    #[JsonProperty('products'), ArrayType([ListFacebookAdEcommerceProductActivityReportingResponseProductsItem::class])]
    public ?array $products;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListFacebookAdEcommerceProductActivityReportingResponseLinksItem>,
     *   products?: ?array<ListFacebookAdEcommerceProductActivityReportingResponseProductsItem>,
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
