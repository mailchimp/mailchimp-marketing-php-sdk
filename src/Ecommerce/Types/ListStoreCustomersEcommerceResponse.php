<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ECommerceCustomer;

/**
 * A collection of the store's customers.
 */
class ListStoreCustomersEcommerceResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListStoreCustomersEcommerceResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListStoreCustomersEcommerceResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ECommerceCustomer> $customers An array of objects, each representing a customer of a store.
     */
    #[JsonProperty('customers'), ArrayType([ECommerceCustomer::class])]
    public ?array $customers;

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
     *   links?: ?array<ListStoreCustomersEcommerceResponseLinksItem>,
     *   customers?: ?array<ECommerceCustomer>,
     *   storeId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->customers = $values['customers'] ?? null;
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
