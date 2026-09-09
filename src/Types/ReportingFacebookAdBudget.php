<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class ReportingFacebookAdBudget extends JsonSerializableType
{
    /**
     * @var ?string $currencyCode Currency code
     */
    #[JsonProperty('currency_code')]
    public ?string $currencyCode;

    /**
     * @var ?int $duration Duration of the ad in seconds
     */
    #[JsonProperty('duration')]
    public ?int $duration;

    /**
     * @var ?float $totalAmount Total budget of the ad
     */
    #[JsonProperty('total_amount')]
    public ?float $totalAmount;

    /**
     * @param array{
     *   currencyCode?: ?string,
     *   duration?: ?int,
     *   totalAmount?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currencyCode = $values['currencyCode'] ?? null;
        $this->duration = $values['duration'] ?? null;
        $this->totalAmount = $values['totalAmount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
