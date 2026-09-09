<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ECommerceOrder;

/**
 * A collection of orders in an account.
 */
class ListOrdersEcommerceResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListOrdersEcommerceResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListOrdersEcommerceResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ECommerceOrder> $orders An array of objects, each representing an order resource.
     */
    #[JsonProperty('orders'), ArrayType([ECommerceOrder::class])]
    public ?array $orders;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListOrdersEcommerceResponseLinksItem>,
     *   orders?: ?array<ECommerceOrder>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->orders = $values['orders'] ?? null;
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
