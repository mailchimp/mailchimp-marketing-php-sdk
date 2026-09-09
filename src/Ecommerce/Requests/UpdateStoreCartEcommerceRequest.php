<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Types\EcommerceStoresCartsPatch;
use Mailchimp\Core\Types\Union;
use Mailchimp\Ecommerce\Types\UpdateStoreCartEcommerceRequestLinesItem;
use Mailchimp\Core\Types\ArrayType;

class UpdateStoreCartEcommerceRequest extends JsonSerializableType
{
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
     * @var ?string $currencyCode The three-letter ISO 4217 code for the currency that the cart uses.
     */
    #[JsonProperty('currency_code')]
    public ?string $currencyCode;

    /**
     * @var ?EcommerceStoresCartsPatch $customer
     */
    #[JsonProperty('customer')]
    public ?EcommerceStoresCartsPatch $customer;

    /**
     * @var (
     *    string
     *   |int
     * )|null $id A unique identifier for the cart.
     */
    #[JsonProperty('id'), Union('string', 'integer', 'null')]
    public string|int|null $id;

    /**
     * @var ?array<UpdateStoreCartEcommerceRequestLinesItem> $lines An array of the cart's line items.
     */
    #[JsonProperty('lines'), ArrayType([UpdateStoreCartEcommerceRequestLinesItem::class])]
    public ?array $lines;

    /**
     * @var (
     *    float
     *   |string
     * )|null $orderTotal
     */
    #[JsonProperty('order_total'), Union('float', 'string', 'null')]
    public float|string|null $orderTotal;

    /**
     * @var (
     *    float
     *   |string
     * )|null $taxTotal
     */
    #[JsonProperty('tax_total'), Union('float', 'string', 'null')]
    public float|string|null $taxTotal;

    /**
     * @param array{
     *   campaignId?: ?string,
     *   checkoutUrl?: ?string,
     *   currencyCode?: ?string,
     *   customer?: ?EcommerceStoresCartsPatch,
     *   id?: (
     *    string
     *   |int
     * )|null,
     *   lines?: ?array<UpdateStoreCartEcommerceRequestLinesItem>,
     *   orderTotal?: (
     *    float
     *   |string
     * )|null,
     *   taxTotal?: (
     *    float
     *   |string
     * )|null,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaignId = $values['campaignId'] ?? null;
        $this->checkoutUrl = $values['checkoutUrl'] ?? null;
        $this->currencyCode = $values['currencyCode'] ?? null;
        $this->customer = $values['customer'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lines = $values['lines'] ?? null;
        $this->orderTotal = $values['orderTotal'] ?? null;
        $this->taxTotal = $values['taxTotal'] ?? null;
    }
}
