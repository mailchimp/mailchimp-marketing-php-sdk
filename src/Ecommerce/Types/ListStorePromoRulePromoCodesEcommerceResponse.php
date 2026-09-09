<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ECommercePromoCode;

/**
 * A collection of the store's promo codes.
 */
class ListStorePromoRulePromoCodesEcommerceResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListStorePromoRulePromoCodesEcommerceResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListStorePromoRulePromoCodesEcommerceResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ECommercePromoCode> $promoCodes An array of objects, each representing promo codes defined for a store.
     */
    #[JsonProperty('promo_codes'), ArrayType([ECommercePromoCode::class])]
    public ?array $promoCodes;

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
     *   links?: ?array<ListStorePromoRulePromoCodesEcommerceResponseLinksItem>,
     *   promoCodes?: ?array<ECommercePromoCode>,
     *   storeId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->promoCodes = $values['promoCodes'] ?? null;
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
