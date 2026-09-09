<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ECommercePromoRule;

/**
 * A collection of the store's promo rules.
 */
class ListStorePromoRulesEcommerceResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListStorePromoRulesEcommerceResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListStorePromoRulesEcommerceResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ECommercePromoRule> $promoRules An array of objects, each representing promo rules defined for a store.
     */
    #[JsonProperty('promo_rules'), ArrayType([ECommercePromoRule::class])]
    public ?array $promoRules;

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
     *   links?: ?array<ListStorePromoRulesEcommerceResponseLinksItem>,
     *   promoRules?: ?array<ECommercePromoRule>,
     *   storeId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->promoRules = $values['promoRules'] ?? null;
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
