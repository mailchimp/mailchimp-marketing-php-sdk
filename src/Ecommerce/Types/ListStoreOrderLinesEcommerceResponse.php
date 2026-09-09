<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ECommerceOrderLineItem;

/**
 * A collection of an order's line items.
 */
class ListStoreOrderLinesEcommerceResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListStoreOrderLinesEcommerceResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListStoreOrderLinesEcommerceResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ECommerceOrderLineItem> $lines An array of objects, each representing an order's line item.
     */
    #[JsonProperty('lines'), ArrayType([ECommerceOrderLineItem::class])]
    public ?array $lines;

    /**
     * @var ?string $orderId The order id.
     */
    #[JsonProperty('order_id')]
    public ?string $orderId;

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
     *   links?: ?array<ListStoreOrderLinesEcommerceResponseLinksItem>,
     *   lines?: ?array<ECommerceOrderLineItem>,
     *   orderId?: ?string,
     *   storeId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->lines = $values['lines'] ?? null;
        $this->orderId = $values['orderId'] ?? null;
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
