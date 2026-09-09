<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * An individual click location.
 */
class ListEepurlReportsResponseClicksLocationsItem extends JsonSerializableType
{
    /**
     * @var ?string $country The two-digit country code for a recorded click.
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $region If available, a specific region where the click was recorded.
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * @param array{
     *   country?: ?string,
     *   region?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->country = $values['country'] ?? null;
        $this->region = $values['region'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
