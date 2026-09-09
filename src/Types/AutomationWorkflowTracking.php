<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The tracking options for the Automation.
 */
class AutomationWorkflowTracking extends JsonSerializableType
{
    /**
     * @var ?AutomationWorkflowTrackingCapsule $capsule Deprecated
     */
    #[JsonProperty('capsule')]
    public ?AutomationWorkflowTrackingCapsule $capsule;

    /**
     * @var ?string $clicktale The custom slug for [ClickTale](https://mailchimp.com/help/additional-tracking-options-for-campaigns/) tracking (max of 50 bytes).
     */
    #[JsonProperty('clicktale')]
    public ?string $clicktale;

    /**
     * @var ?bool $ecomm360 Whether to enable e-commerce tracking.
     */
    #[JsonProperty('ecomm360')]
    public ?bool $ecomm360;

    /**
     * @var ?bool $goalTracking Deprecated
     */
    #[JsonProperty('goal_tracking')]
    public ?bool $goalTracking;

    /**
     * @var ?string $googleAnalytics The custom slug for [Google Analytics](https://mailchimp.com/help/integrate-google-analytics-with-mailchimp/) tracking (max of 50 bytes).
     */
    #[JsonProperty('google_analytics')]
    public ?string $googleAnalytics;

    /**
     * @var ?bool $htmlClicks Whether to [track clicks](https://mailchimp.com/help/enable-and-view-click-tracking/) in the HTML version of the Automation. Defaults to `true`.
     */
    #[JsonProperty('html_clicks')]
    public ?bool $htmlClicks;

    /**
     * @var ?bool $opens Whether to [track opens](https://mailchimp.com/help/about-open-tracking/). Defaults to `true`.
     */
    #[JsonProperty('opens')]
    public ?bool $opens;

    /**
     * @var ?AutomationWorkflowTrackingSalesforce $salesforce Deprecated
     */
    #[JsonProperty('salesforce')]
    public ?AutomationWorkflowTrackingSalesforce $salesforce;

    /**
     * @var ?bool $textClicks Whether to [track clicks](https://mailchimp.com/help/enable-and-view-click-tracking/) in the plain-text version of the Automation. Defaults to `true`.
     */
    #[JsonProperty('text_clicks')]
    public ?bool $textClicks;

    /**
     * @param array{
     *   capsule?: ?AutomationWorkflowTrackingCapsule,
     *   clicktale?: ?string,
     *   ecomm360?: ?bool,
     *   goalTracking?: ?bool,
     *   googleAnalytics?: ?string,
     *   htmlClicks?: ?bool,
     *   opens?: ?bool,
     *   salesforce?: ?AutomationWorkflowTrackingSalesforce,
     *   textClicks?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->capsule = $values['capsule'] ?? null;
        $this->clicktale = $values['clicktale'] ?? null;
        $this->ecomm360 = $values['ecomm360'] ?? null;
        $this->goalTracking = $values['goalTracking'] ?? null;
        $this->googleAnalytics = $values['googleAnalytics'] ?? null;
        $this->htmlClicks = $values['htmlClicks'] ?? null;
        $this->opens = $values['opens'] ?? null;
        $this->salesforce = $values['salesforce'] ?? null;
        $this->textClicks = $values['textClicks'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
