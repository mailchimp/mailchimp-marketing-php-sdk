<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Ecommerce\Types\UpdateStoreOrderEcommerceRequestBillingAddress;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;
use Mailchimp\Types\EcommerceStoresCartsPatch;
use Mailchimp\Ecommerce\Types\UpdateStoreOrderEcommerceRequestLinesItem;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Ecommerce\Types\UpdateStoreOrderEcommerceRequestOutreach;
use Mailchimp\Ecommerce\Types\UpdateStoreOrderEcommerceRequestPromosItem;
use Mailchimp\Ecommerce\Types\UpdateStoreOrderEcommerceRequestShippingAddress;
use Mailchimp\Ecommerce\Types\UpdateStoreOrderEcommerceRequestTrackingCode;

class UpdateStoreOrderEcommerceRequest extends JsonSerializableType
{
    /**
     * @var ?UpdateStoreOrderEcommerceRequestBillingAddress $billingAddress The billing address for the order.
     */
    #[JsonProperty('billing_address')]
    public ?UpdateStoreOrderEcommerceRequestBillingAddress $billingAddress;

    /**
     * @var ?string $campaignId A string that uniquely identifies the campaign associated with an order.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var (
     *    string
     *   |int
     * )|null $cartId A cart id that the order was placed for.
     */
    #[JsonProperty('cart_id'), Union('string', 'integer', 'null')]
    public string|int|null $cartId;

    /**
     * @var ?string $cancelledAtForeign The date and time the order was cancelled in ISO 8601 format. Note: passing a value for this parameter will cancel the order being edited.
     */
    #[JsonProperty('cancelled_at_foreign')]
    public ?string $cancelledAtForeign;

    /**
     * @var ?string $currencyCode The three-letter ISO 4217 code for the currency that the store accepts.
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
     *    float
     *   |string
     * )|null $discountTotal
     */
    #[JsonProperty('discount_total'), Union('float', 'string', 'null')]
    public float|string|null $discountTotal;

    /**
     * @var ?string $financialStatus The order status. Use this parameter to trigger [Order Notifications](https://mailchimp.com/developer/marketing/docs/e-commerce/#order-notifications).
     */
    #[JsonProperty('financial_status')]
    public ?string $financialStatus;

    /**
     * @var ?string $fulfillmentStatus The fulfillment status for the order. Use this parameter to trigger [Order Notifications](https://mailchimp.com/developer/marketing/docs/e-commerce/#order-notifications).
     */
    #[JsonProperty('fulfillment_status')]
    public ?string $fulfillmentStatus;

    /**
     * @var ?string $id A unique identifier for the order.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $landingSite The URL for the page where the buyer landed when entering the shop.
     */
    #[JsonProperty('landing_site')]
    public ?string $landingSite;

    /**
     * @var ?array<UpdateStoreOrderEcommerceRequestLinesItem> $lines An array of the order's line items.
     */
    #[JsonProperty('lines'), ArrayType([UpdateStoreOrderEcommerceRequestLinesItem::class])]
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
     * @var ?string $orderUrl The URL for the order.
     */
    #[JsonProperty('order_url')]
    public ?string $orderUrl;

    /**
     * @var ?UpdateStoreOrderEcommerceRequestOutreach $outreach The outreach associated with this order. For example, an email campaign or Facebook ad.
     */
    #[JsonProperty('outreach')]
    public ?UpdateStoreOrderEcommerceRequestOutreach $outreach;

    /**
     * @var ?string $processedAtForeign The date and time the order was processed in ISO 8601 format.
     */
    #[JsonProperty('processed_at_foreign')]
    public ?string $processedAtForeign;

    /**
     * @var ?array<UpdateStoreOrderEcommerceRequestPromosItem> $promos The promo codes applied on the order. Note: Patch will completely replace the value of promos with the new one provided.
     */
    #[JsonProperty('promos'), ArrayType([UpdateStoreOrderEcommerceRequestPromosItem::class])]
    public ?array $promos;

    /**
     * @var ?UpdateStoreOrderEcommerceRequestShippingAddress $shippingAddress The shipping address for the order.
     */
    #[JsonProperty('shipping_address')]
    public ?UpdateStoreOrderEcommerceRequestShippingAddress $shippingAddress;

    /**
     * @var (
     *    float
     *   |string
     * )|null $shippingTotal
     */
    #[JsonProperty('shipping_total'), Union('float', 'string', 'null')]
    public float|string|null $shippingTotal;

    /**
     * @var (
     *    float
     *   |string
     * )|null $taxTotal
     */
    #[JsonProperty('tax_total'), Union('float', 'string', 'null')]
    public float|string|null $taxTotal;

    /**
     * @var ?string $trackingCarrier The tracking carrier associated with the order.
     */
    #[JsonProperty('tracking_carrier')]
    public ?string $trackingCarrier;

    /**
     * @var ?value-of<UpdateStoreOrderEcommerceRequestTrackingCode> $trackingCode The Mailchimp tracking code for the order. Uses the 'mc_tc' parameter in E-Commerce tracking URLs.
     */
    #[JsonProperty('tracking_code')]
    public ?string $trackingCode;

    /**
     * @var ?string $trackingNumber The tracking number associated with the order.
     */
    #[JsonProperty('tracking_number')]
    public ?string $trackingNumber;

    /**
     * @var ?string $trackingUrl The tracking URL associated with the order.
     */
    #[JsonProperty('tracking_url')]
    public ?string $trackingUrl;

    /**
     * @var ?string $updatedAtForeign The date and time the order was updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at_foreign')]
    public ?string $updatedAtForeign;

    /**
     * @param array{
     *   billingAddress?: ?UpdateStoreOrderEcommerceRequestBillingAddress,
     *   campaignId?: ?string,
     *   cartId?: (
     *    string
     *   |int
     * )|null,
     *   cancelledAtForeign?: ?string,
     *   currencyCode?: ?string,
     *   customer?: ?EcommerceStoresCartsPatch,
     *   discountTotal?: (
     *    float
     *   |string
     * )|null,
     *   financialStatus?: ?string,
     *   fulfillmentStatus?: ?string,
     *   id?: ?string,
     *   landingSite?: ?string,
     *   lines?: ?array<UpdateStoreOrderEcommerceRequestLinesItem>,
     *   orderTotal?: (
     *    float
     *   |string
     * )|null,
     *   orderUrl?: ?string,
     *   outreach?: ?UpdateStoreOrderEcommerceRequestOutreach,
     *   processedAtForeign?: ?string,
     *   promos?: ?array<UpdateStoreOrderEcommerceRequestPromosItem>,
     *   shippingAddress?: ?UpdateStoreOrderEcommerceRequestShippingAddress,
     *   shippingTotal?: (
     *    float
     *   |string
     * )|null,
     *   taxTotal?: (
     *    float
     *   |string
     * )|null,
     *   trackingCarrier?: ?string,
     *   trackingCode?: ?value-of<UpdateStoreOrderEcommerceRequestTrackingCode>,
     *   trackingNumber?: ?string,
     *   trackingUrl?: ?string,
     *   updatedAtForeign?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->billingAddress = $values['billingAddress'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->cartId = $values['cartId'] ?? null;
        $this->cancelledAtForeign = $values['cancelledAtForeign'] ?? null;
        $this->currencyCode = $values['currencyCode'] ?? null;
        $this->customer = $values['customer'] ?? null;
        $this->discountTotal = $values['discountTotal'] ?? null;
        $this->financialStatus = $values['financialStatus'] ?? null;
        $this->fulfillmentStatus = $values['fulfillmentStatus'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->landingSite = $values['landingSite'] ?? null;
        $this->lines = $values['lines'] ?? null;
        $this->orderTotal = $values['orderTotal'] ?? null;
        $this->orderUrl = $values['orderUrl'] ?? null;
        $this->outreach = $values['outreach'] ?? null;
        $this->processedAtForeign = $values['processedAtForeign'] ?? null;
        $this->promos = $values['promos'] ?? null;
        $this->shippingAddress = $values['shippingAddress'] ?? null;
        $this->shippingTotal = $values['shippingTotal'] ?? null;
        $this->taxTotal = $values['taxTotal'] ?? null;
        $this->trackingCarrier = $values['trackingCarrier'] ?? null;
        $this->trackingCode = $values['trackingCode'] ?? null;
        $this->trackingNumber = $values['trackingNumber'] ?? null;
        $this->trackingUrl = $values['trackingUrl'] ?? null;
        $this->updatedAtForeign = $values['updatedAtForeign'] ?? null;
    }
}
