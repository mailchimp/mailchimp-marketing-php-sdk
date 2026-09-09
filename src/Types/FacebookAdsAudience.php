<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Audience settings
 */
class FacebookAdsAudience extends JsonSerializableType
{
    /**
     * @var ?FacebookAdsAudienceEmailSource $emailSource
     */
    #[JsonProperty('email_source')]
    public ?FacebookAdsAudienceEmailSource $emailSource;

    /**
     * @var ?bool $includeSourceInTarget To include list contacts as part of audience
     */
    #[JsonProperty('include_source_in_target')]
    public ?bool $includeSourceInTarget;

    /**
     * @var ?string $lookalikeCountryCode To find similar audience in given country
     */
    #[JsonProperty('lookalike_country_code')]
    public ?string $lookalikeCountryCode;

    /**
     * @var ?value-of<FacebookAdsAudienceSourceType> $sourceType List or Facebook based audience
     */
    #[JsonProperty('source_type')]
    public ?string $sourceType;

    /**
     * @var ?FacebookAdsAudienceTargetingSpecs $targetingSpecs
     */
    #[JsonProperty('targeting_specs')]
    public ?FacebookAdsAudienceTargetingSpecs $targetingSpecs;

    /**
     * @var ?value-of<FacebookAdsAudienceType> $type Type of the audience
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   emailSource?: ?FacebookAdsAudienceEmailSource,
     *   includeSourceInTarget?: ?bool,
     *   lookalikeCountryCode?: ?string,
     *   sourceType?: ?value-of<FacebookAdsAudienceSourceType>,
     *   targetingSpecs?: ?FacebookAdsAudienceTargetingSpecs,
     *   type?: ?value-of<FacebookAdsAudienceType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailSource = $values['emailSource'] ?? null;
        $this->includeSourceInTarget = $values['includeSourceInTarget'] ?? null;
        $this->lookalikeCountryCode = $values['lookalikeCountryCode'] ?? null;
        $this->sourceType = $values['sourceType'] ?? null;
        $this->targetingSpecs = $values['targetingSpecs'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
