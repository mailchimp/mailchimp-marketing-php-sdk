<?php

namespace Mailchimp\LandingPages\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The tracking settings applied to this landing page.
 */
class UpdateLandingPagesRequestTracking extends JsonSerializableType
{
    /**
     * @var ?bool $enableRestrictedDataProcessing Google offers restricted data processing in connection with the California Consumer Privacy Act (CCPA) to restrict how Google uses certain identifiers and other data processed in the provision of its services. You can learn more about Google's restricted data processing within Google Ads [here](https://privacy.google.com/businesses/rdp/).
     */
    #[JsonProperty('enable_restricted_data_processing')]
    public ?bool $enableRestrictedDataProcessing;

    /**
     * @var ?bool $trackWithMailchimp Use cookies to track unique visitors and calculate overall conversion rate. Learn more [here](https://mailchimp.com/help/use-track-mailchimp/).
     */
    #[JsonProperty('track_with_mailchimp')]
    public ?bool $trackWithMailchimp;

    /**
     * @param array{
     *   enableRestrictedDataProcessing?: ?bool,
     *   trackWithMailchimp?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enableRestrictedDataProcessing = $values['enableRestrictedDataProcessing'] ?? null;
        $this->trackWithMailchimp = $values['trackWithMailchimp'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
