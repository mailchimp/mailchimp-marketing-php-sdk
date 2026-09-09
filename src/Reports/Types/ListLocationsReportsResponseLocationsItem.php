<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class ListLocationsReportsResponseLocationsItem extends JsonSerializableType
{
    /**
     * @var ?string $countryCode The ISO 3166 2 digit country code.
     */
    #[JsonProperty('country_code')]
    public ?string $countryCode;

    /**
     * @var ?int $opens The number of unique campaign opens for a region.
     */
    #[JsonProperty('opens')]
    public ?int $opens;

    /**
     * @var ?int $proxyExcludedOpens The number of unique campaign opens for a region excluding opens from email clients that use proxies.
     */
    #[JsonProperty('proxy_excluded_opens')]
    public ?int $proxyExcludedOpens;

    /**
     * @var ?string $region An internal code for the region representing the more specific location area such as city or state. When this is blank, it indicates we know the country, but not the region.
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * @var ?string $regionName The name of the region, if we have one. For blank "region" values, this will be "Rest of Country".
     */
    #[JsonProperty('region_name')]
    public ?string $regionName;

    /**
     * @param array{
     *   countryCode?: ?string,
     *   opens?: ?int,
     *   proxyExcludedOpens?: ?int,
     *   region?: ?string,
     *   regionName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->countryCode = $values['countryCode'] ?? null;
        $this->opens = $values['opens'] ?? null;
        $this->proxyExcludedOpens = $values['proxyExcludedOpens'] ?? null;
        $this->region = $values['region'] ?? null;
        $this->regionName = $values['regionName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
