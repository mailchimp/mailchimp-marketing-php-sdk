<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ECommerceCartLineItem;

/**
 * A collection of a cart's line items.
 */
class ListStoreCartLinesEcommerceResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListStoreCartLinesEcommerceResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListStoreCartLinesEcommerceResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $cartId The cart id.
     */
    #[JsonProperty('cart_id')]
    public ?string $cartId;

    /**
     * @var ?array<ECommerceCartLineItem> $lines An array of objects, each representing a cart's line item.
     */
    #[JsonProperty('lines'), ArrayType([ECommerceCartLineItem::class])]
    public ?array $lines;

    /**
     * @var ?string $storeId The store id.
     */
    #[JsonProperty('store_id')]
    public ?string $storeId;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListStoreCartLinesEcommerceResponseLinksItem>,
     *   cartId?: ?string,
     *   lines?: ?array<ECommerceCartLineItem>,
     *   storeId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->cartId = $values['cartId'] ?? null;
        $this->lines = $values['lines'] ?? null;
        $this->storeId = $values['storeId'] ?? null;
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
