<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Types\EcommerceStoresCartsPost;
use Mailchimp\Core\Types\Union;
use Mailchimp\Ecommerce\Types\CreateStoreCartEcommerceRequestLinesItem;
use Mailchimp\Core\Types\ArrayType;

class CreateStoreCartEcommerceRequest extends JsonSerializableType
{
    /**
     * @var ?string $campaignId A string that uniquely identifies the campaign for a cart.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?string $checkoutUrl The URL for the cart. This parameter is required for [Abandoned Cart](https://mailchimp.com/help/create-a-classic-abandoned-cart-email/) automations.
     */
    #[JsonProperty('checkout_url')]
    public ?string $checkoutUrl;

    /**
     * @var string $currencyCode The three-letter ISO 4217 code for the currency that the cart uses.
     */
    #[JsonProperty('currency_code')]
    public string $currencyCode;

    /**
     * @var EcommerceStoresCartsPost $customer
     */
    #[JsonProperty('customer')]
    public EcommerceStoresCartsPost $customer;

    /**
     * @var (
     *    string
     *   |int
     * ) $id A unique identifier for the cart.
     */
    #[JsonProperty('id'), Union('string', 'integer')]
    public string|int $id;

    /**
     * @var array<CreateStoreCartEcommerceRequestLinesItem> $lines An array of the cart's line items.
     */
    #[JsonProperty('lines'), ArrayType([CreateStoreCartEcommerceRequestLinesItem::class])]
    public array $lines;

    /**
     * @var (
     *    float
     *   |string
     * ) $orderTotal
     */
    #[JsonProperty('order_total'), Union('float', 'string')]
    public float|string $orderTotal;

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
     *   currencyCode: string,
     *   customer: EcommerceStoresCartsPost,
     *   id: (
     *    string
     *   |int
     * ),
     *   lines: array<CreateStoreCartEcommerceRequestLinesItem>,
     *   orderTotal: (
     *    float
     *   |string
     * ),
     *   campaignId?: ?string,
     *   checkoutUrl?: ?string,
     *   taxTotal?: (
     *    float
     *   |string
     * )|null,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->campaignId = $values['campaignId'] ?? null;
        $this->checkoutUrl = $values['checkoutUrl'] ?? null;
        $this->currencyCode = $values['currencyCode'];
        $this->customer = $values['customer'];
        $this->id = $values['id'];
        $this->lines = $values['lines'];
        $this->orderTotal = $values['orderTotal'];
        $this->taxTotal = $values['taxTotal'] ?? null;
    }
}
