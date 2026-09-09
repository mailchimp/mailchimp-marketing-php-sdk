<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

class ReportingFacebookAdAudienceTargetingSpecsLocations extends JsonSerializableType
{
    /**
     * @var ?array<string> $cities
     */
    #[JsonProperty('cities'), ArrayType(['string'])]
    public ?array $cities;

    /**
     * @var ?array<string> $countries
     */
    #[JsonProperty('countries'), ArrayType(['string'])]
    public ?array $countries;

    /**
     * @var ?array<string> $regions
     */
    #[JsonProperty('regions'), ArrayType(['string'])]
    public ?array $regions;

    /**
     * @var ?array<string> $zips
     */
    #[JsonProperty('zips'), ArrayType(['string'])]
    public ?array $zips;

    /**
     * @param array{
     *   cities?: ?array<string>,
     *   countries?: ?array<string>,
     *   regions?: ?array<string>,
     *   zips?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cities = $values['cities'] ?? null;
        $this->countries = $values['countries'] ?? null;
        $this->regions = $values['regions'] ?? null;
        $this->zips = $values['zips'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
