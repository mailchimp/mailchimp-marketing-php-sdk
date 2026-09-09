<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;
use Mailchimp\Core\Types\Union;

/**
 * Information about a specific order.
 */
class ECommerceOrder extends JsonSerializableType
{
    /**
     * @var ?array<ECommerceOrderLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ECommerceOrderLinksItem::class])]
    public ?array $links;

    /**
     * @var ?ECommerceOrderBillingAddress $billingAddress The billing address for the order.
     */
    #[JsonProperty('billing_address')]
    public ?ECommerceOrderBillingAddress $billingAddress;

    /**
     * @var ?string $campaignId A string that uniquely identifies the campaign associated with an order.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?string $cartId A cart id that the order was placed for.
     */
    #[JsonProperty('cart_id')]
    public ?string $cartId;

    /**
     * @var ?DateTime $cancelledAtForeign The date and time the order was cancelled in ISO 8601 format.
     */
    #[JsonProperty('cancelled_at_foreign'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $cancelledAtForeign;

    /**
     * @var ?string $currencyCode The three-letter ISO 4217 code for the currency that the store accepts.
     */
    #[JsonProperty('currency_code')]
    public ?string $currencyCode;

    /**
     * @var ?ECommerceCustomer $customer
     */
    #[JsonProperty('customer')]
    public ?ECommerceCustomer $customer;

    /**
     * @var ?float $discountTotal The total amount of the discounts to be applied to the price of the order.
     */
    #[JsonProperty('discount_total')]
    public ?float $discountTotal;

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
     * @var ?array<ECommerceOrderLineItem> $lines An array of the order's line items.
     */
    #[JsonProperty('lines'), ArrayType([ECommerceOrderLineItem::class])]
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
     * @var ?ECommerceOrderOutreach $outreach The outreach associated with this order. For example, an email campaign or Facebook ad.
     */
    #[JsonProperty('outreach')]
    public ?ECommerceOrderOutreach $outreach;

    /**
     * @var ?DateTime $processedAtForeign The date and time the order was processed in ISO 8601 format.
     */
    #[JsonProperty('processed_at_foreign'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $processedAtForeign;

    /**
     * @var ?array<ECommerceOrderPromosItem> $promos The promo codes applied on the order
     */
    #[JsonProperty('promos'), ArrayType([ECommerceOrderPromosItem::class])]
    public ?array $promos;

    /**
     * @var ?ECommerceOrderShippingAddress $shippingAddress The shipping address for the order.
     */
    #[JsonProperty('shipping_address')]
    public ?ECommerceOrderShippingAddress $shippingAddress;

    /**
     * @var (
     *    float
     *   |string
     * )|null $shippingTotal
     */
    #[JsonProperty('shipping_total'), Union('float', 'string', 'null')]
    public float|string|null $shippingTotal;

    /**
     * @var ?string $storeId The unique identifier for the store.
     */
    #[JsonProperty('store_id')]
    public ?string $storeId;

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
     * @var ?value-of<ECommerceOrderTrackingCode> $trackingCode The Mailchimp tracking code for the order. Uses the 'mc_tc' parameter in E-Commerce tracking URLs.
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
     * @var ?DateTime $updatedAtForeign The date and time the order was updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at_foreign'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAtForeign;

    /**
     * @param array{
     *   links?: ?array<ECommerceOrderLinksItem>,
     *   billingAddress?: ?ECommerceOrderBillingAddress,
     *   campaignId?: ?string,
     *   cartId?: ?string,
     *   cancelledAtForeign?: ?DateTime,
     *   currencyCode?: ?string,
     *   customer?: ?ECommerceCustomer,
     *   discountTotal?: ?float,
     *   financialStatus?: ?string,
     *   fulfillmentStatus?: ?string,
     *   id?: ?string,
     *   landingSite?: ?string,
     *   lines?: ?array<ECommerceOrderLineItem>,
     *   orderTotal?: (
     *    float
     *   |string
     * )|null,
     *   orderUrl?: ?string,
     *   outreach?: ?ECommerceOrderOutreach,
     *   processedAtForeign?: ?DateTime,
     *   promos?: ?array<ECommerceOrderPromosItem>,
     *   shippingAddress?: ?ECommerceOrderShippingAddress,
     *   shippingTotal?: (
     *    float
     *   |string
     * )|null,
     *   storeId?: ?string,
     *   taxTotal?: (
     *    float
     *   |string
     * )|null,
     *   trackingCarrier?: ?string,
     *   trackingCode?: ?value-of<ECommerceOrderTrackingCode>,
     *   trackingNumber?: ?string,
     *   trackingUrl?: ?string,
     *   updatedAtForeign?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
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
        $this->storeId = $values['storeId'] ?? null;
        $this->taxTotal = $values['taxTotal'] ?? null;
        $this->trackingCarrier = $values['trackingCarrier'] ?? null;
        $this->trackingCode = $values['trackingCode'] ?? null;
        $this->trackingNumber = $values['trackingNumber'] ?? null;
        $this->trackingUrl = $values['trackingUrl'] ?? null;
        $this->updatedAtForeign = $values['updatedAtForeign'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
