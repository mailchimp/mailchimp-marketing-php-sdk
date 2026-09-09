<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class ReportingFacebookAdReportSummaryEcommerce extends JsonSerializableType
{
    /**
     * @var ?string $currencyCode
     */
    #[JsonProperty('currency_code')]
    public ?string $currencyCode;

    /**
     * @var ?float $totalRevenue
     */
    #[JsonProperty('total_revenue')]
    public ?float $totalRevenue;

    /**
     * @param array{
     *   currencyCode?: ?string,
     *   totalRevenue?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currencyCode = $values['currencyCode'] ?? null;
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
