<?php

namespace Mailchimp\Campaigns\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Campaigns\Types\UpdateCampaignsRequestRecipients;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Campaigns\Types\UpdateCampaignsRequestRssOpts;
use Mailchimp\Campaigns\Types\UpdateCampaignsRequestSettings;
use Mailchimp\Campaigns\Types\UpdateCampaignsRequestSocialCard;
use Mailchimp\Types\CampaignTrackingOptions;
use Mailchimp\Campaigns\Types\UpdateCampaignsRequestVariateSettings;

class UpdateCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?UpdateCampaignsRequestRecipients $recipients List settings for the campaign.
     */
    #[JsonProperty('recipients')]
    public ?UpdateCampaignsRequestRecipients $recipients;

    /**
     * @var ?UpdateCampaignsRequestRssOpts $rssOpts [RSS](https://mailchimp.com/help/share-your-blog-posts-with-mailchimp/) options for a campaign.
     */
    #[JsonProperty('rss_opts')]
    public ?UpdateCampaignsRequestRssOpts $rssOpts;

    /**
     * @var ?UpdateCampaignsRequestSettings $settings The settings for your campaign, including subject, from name, reply-to address, and more.
     */
    #[JsonProperty('settings')]
    public ?UpdateCampaignsRequestSettings $settings;

    /**
     * @var ?UpdateCampaignsRequestSocialCard $socialCard The preview for the campaign, rendered by social networks like Facebook and Twitter. [Learn more](https://mailchimp.com/help/enable-and-customize-social-cards/).
     */
    #[JsonProperty('social_card')]
    public ?UpdateCampaignsRequestSocialCard $socialCard;

    /**
     * @var ?CampaignTrackingOptions $tracking
     */
    #[JsonProperty('tracking')]
    public ?CampaignTrackingOptions $tracking;

    /**
     * @var ?UpdateCampaignsRequestVariateSettings $variateSettings The settings specific to A/B test campaigns.
     */
    #[JsonProperty('variate_settings')]
    public ?UpdateCampaignsRequestVariateSettings $variateSettings;

    /**
     * @param array{
     *   recipients?: ?UpdateCampaignsRequestRecipients,
     *   rssOpts?: ?UpdateCampaignsRequestRssOpts,
     *   settings?: ?UpdateCampaignsRequestSettings,
     *   socialCard?: ?UpdateCampaignsRequestSocialCard,
     *   tracking?: ?CampaignTrackingOptions,
     *   variateSettings?: ?UpdateCampaignsRequestVariateSettings,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->recipients = $values['recipients'] ?? null;
        $this->rssOpts = $values['rssOpts'] ?? null;
        $this->settings = $values['settings'] ?? null;
        $this->socialCard = $values['socialCard'] ?? null;
        $this->tracking = $values['tracking'] ?? null;
        $this->variateSettings = $values['variateSettings'] ?? null;
    }
}
