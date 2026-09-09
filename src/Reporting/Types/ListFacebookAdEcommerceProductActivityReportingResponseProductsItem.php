<?php

namespace Mailchimp\Reporting\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class ListFacebookAdEcommerceProductActivityReportingResponseProductsItem extends JsonSerializableType
{
    /**
     * @var ?string $currencyCode
     */
    #[JsonProperty('currency_code')]
    public ?string $currencyCode;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('image_url')]
    public ?string $imageUrl;

    /**
     * @var ?int $recommendationPurchased
     */
    #[JsonProperty('recommendation_purchased')]
    public ?int $recommendationPurchased;

    /**
     * @var ?int $recommendationTotal
     */
    #[JsonProperty('recommendation_total')]
    public ?int $recommendationTotal;

    /**
     * @var ?string $sku
     */
    #[JsonProperty('sku')]
    public ?string $sku;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?float $totalPurchased
     */
    #[JsonProperty('total_purchased')]
    public ?float $totalPurchased;

    /**
     * @var ?float $totalRevenue
     */
    #[JsonProperty('total_revenue')]
    public ?float $totalRevenue;

    /**
     * @param array{
     *   currencyCode?: ?string,
     *   imageUrl?: ?string,
     *   recommendationPurchased?: ?int,
     *   recommendationTotal?: ?int,
     *   sku?: ?string,
     *   title?: ?string,
     *   totalPurchased?: ?float,
     *   totalRevenue?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currencyCode = $values['currencyCode'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->recommendationPurchased = $values['recommendationPurchased'] ?? null;
        $this->recommendationTotal = $values['recommendationTotal'] ?? null;
        $this->sku = $values['sku'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->totalPurchased = $values['totalPurchased'] ?? null;
        $this->totalRevenue = $values['totalRevenue'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
