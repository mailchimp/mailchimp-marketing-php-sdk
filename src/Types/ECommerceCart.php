<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Information about a specific cart.
 */
class ECommerceCart extends JsonSerializableType
{
    /**
     * @var ?array<ECommerceCartLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ECommerceCartLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId A string that uniquely identifies the campaign associated with a cart.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?string $checkoutUrl The URL for the cart. This parameter is required for [Abandoned Cart](https://mailchimp.com/help/create-a-classic-abandoned-cart-email/) automations.
     */
    #[JsonProperty('checkout_url')]
    public ?string $checkoutUrl;

    /**
     * @var ?DateTime $createdAt The date and time the cart was created in ISO 8601 format.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $currencyCode The three-letter ISO 4217 code for the currency that the cart uses.
     */
    #[JsonProperty('currency_code')]
    public ?string $currencyCode;

    /**
     * @var ?ECommerceCustomer $customer
     */
    #[JsonProperty('customer')]
    public ?ECommerceCustomer $customer;

    /**
     * @var ?string $id A unique identifier for the cart.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?array<ECommerceCartLineItem> $lines An array of the cart's line items.
     */
    #[JsonProperty('lines'), ArrayType([ECommerceCartLineItem::class])]
    public ?array $lines;

    /**
     * @var ?float $orderTotal The order total for the cart.
     */
    #[JsonProperty('order_total')]
    public ?float $orderTotal;

    /**
     * @var ?float $taxTotal The total tax for the cart.
     */
    #[JsonProperty('tax_total')]
    public ?float $taxTotal;

    /**
     * @var ?DateTime $updatedAt The date and time the cart was last updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   links?: ?array<ECommerceCartLinksItem>,
     *   campaignId?: ?string,
     *   checkoutUrl?: ?string,
     *   createdAt?: ?DateTime,
     *   currencyCode?: ?string,
     *   customer?: ?ECommerceCustomer,
     *   id?: ?string,
     *   lines?: ?array<ECommerceCartLineItem>,
     *   orderTotal?: ?float,
     *   taxTotal?: ?float,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->checkoutUrl = $values['checkoutUrl'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->currencyCode = $values['currencyCode'] ?? null;
        $this->customer = $values['customer'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lines = $values['lines'] ?? null;
        $this->orderTotal = $values['orderTotal'] ?? null;
        $this->taxTotal = $values['taxTotal'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
