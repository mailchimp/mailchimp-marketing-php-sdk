<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Channel settings
 */
class ReportingFacebookAdChannel extends JsonSerializableType
{
    /**
     * @var ?bool $fbPlacementAudience Is this for facebook audience
     */
    #[JsonProperty('fb_placement_audience')]
    public ?bool $fbPlacementAudience;

    /**
     * @var ?bool $fbPlacementFeed Is this for facebook feed
     */
    #[JsonProperty('fb_placement_feed')]
    public ?bool $fbPlacementFeed;

    /**
     * @var ?bool $igPlacementFeed Is this for instagram feed
     */
    #[JsonProperty('ig_placement_feed')]
    public ?bool $igPlacementFeed;

    /**
     * @param array{
     *   fbPlacementAudience?: ?bool,
     *   fbPlacementFeed?: ?bool,
     *   igPlacementFeed?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fbPlacementAudience = $values['fbPlacementAudience'] ?? null;
        $this->fbPlacementFeed = $values['fbPlacementFeed'] ?? null;
        $this->igPlacementFeed = $values['igPlacementFeed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
