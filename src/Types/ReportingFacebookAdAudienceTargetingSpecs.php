<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

class ReportingFacebookAdAudienceTargetingSpecs extends JsonSerializableType
{
    /**
     * @var ?int $gender
     */
    #[JsonProperty('gender')]
    public ?int $gender;

    /**
     * @var ?array<ReportingFacebookAdAudienceTargetingSpecsInterestsItem> $interests
     */
    #[JsonProperty('interests'), ArrayType([ReportingFacebookAdAudienceTargetingSpecsInterestsItem::class])]
    public ?array $interests;

    /**
     * @var ?ReportingFacebookAdAudienceTargetingSpecsLocations $locations
     */
    #[JsonProperty('locations')]
    public ?ReportingFacebookAdAudienceTargetingSpecsLocations $locations;

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
     *   interests?: ?array<ReportingFacebookAdAudienceTargetingSpecsInterestsItem>,
     *   locations?: ?ReportingFacebookAdAudienceTargetingSpecsLocations,
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
