<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

class FacebookAdsAudienceTargetingSpecs extends JsonSerializableType
{
    /**
     * @var ?int $gender
     */
    #[JsonProperty('gender')]
    public ?int $gender;

    /**
     * @var ?array<FacebookAdsAudienceTargetingSpecsInterestsItem> $interests
     */
    #[JsonProperty('interests'), ArrayType([FacebookAdsAudienceTargetingSpecsInterestsItem::class])]
    public ?array $interests;

    /**
     * @var ?FacebookAdsAudienceTargetingSpecsLocations $locations
     */
    #[JsonProperty('locations')]
    public ?FacebookAdsAudienceTargetingSpecsLocations $locations;

    /**
     * @var ?int $maxAge
     */
    #[JsonProperty('max_age')]
    public ?int $maxAge;

    /**
     * @var ?int $minAge
     */
    #[JsonProperty('min_age')]
    public ?int $minAge;

    /**
     * @param array{
     *   gender?: ?int,
     *   interests?: ?array<FacebookAdsAudienceTargetingSpecsInterestsItem>,
     *   locations?: ?FacebookAdsAudienceTargetingSpecsLocations,
     *   maxAge?: ?int,
     *   minAge?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->gender = $values['gender'] ?? null;
        $this->interests = $values['interests'] ?? null;
        $this->locations = $values['locations'] ?? null;
        $this->maxAge = $values['maxAge'] ?? null;
        $this->minAge = $values['minAge'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
