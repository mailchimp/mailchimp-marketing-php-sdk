<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

class ReportingFacebookAdAudienceActivity extends JsonSerializableType
{
    /**
     * @var ?array<ReportingFacebookAdAudienceActivityClicksItem> $clicks
     */
    #[JsonProperty('clicks'), ArrayType([ReportingFacebookAdAudienceActivityClicksItem::class])]
    public ?array $clicks;

    /**
     * @var ?array<ReportingFacebookAdAudienceActivityImpressionsItem> $impressions
     */
    #[JsonProperty('impressions'), ArrayType([ReportingFacebookAdAudienceActivityImpressionsItem::class])]
    public ?array $impressions;

    /**
     * @var ?array<ReportingFacebookAdAudienceActivityRevenueItem> $revenue
     */
    #[JsonProperty('revenue'), ArrayType([ReportingFacebookAdAudienceActivityRevenueItem::class])]
    public ?array $revenue;

    /**
     * @param array{
     *   clicks?: ?array<ReportingFacebookAdAudienceActivityClicksItem>,
     *   impressions?: ?array<ReportingFacebookAdAudienceActivityImpressionsItem>,
     *   revenue?: ?array<ReportingFacebookAdAudienceActivityRevenueItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clicks = $values['clicks'] ?? null;
        $this->impressions = $values['impressions'] ?? null;
        $this->revenue = $values['revenue'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
