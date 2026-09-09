<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Types\ECommerceOrder;
use Mailchimp\Core\Types\ArrayType;

/**
 * A collection of orders in a store.
 */
class ListStoreOrdersEcommerceResponse extends JsonSerializableType
{
    /**
     * @var ?string $storeId The store id.
     */
    #[JsonProperty('store_id')]
    public ?string $storeId;

    /**
     * @var ?array<ECommerceOrder> $orders An array of objects, each representing an order in a store.
     */
    #[JsonProperty('orders'), ArrayType([ECommerceOrder::class])]
    public ?array $orders;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @var ?array<ListStoreOrdersEcommerceResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListStoreOrdersEcommerceResponseLinksItem::class])]
    public ?array $links;

    /**
     * @param array{
     *   storeId?: ?string,
     *   orders?: ?array<ECommerceOrder>,
     *   totalItems?: ?int,
     *   links?: ?array<ListStoreOrdersEcommerceResponseLinksItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->storeId = $values['storeId'] ?? null;
        $this->orders = $values['orders'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
        $this->links = $values['links'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
