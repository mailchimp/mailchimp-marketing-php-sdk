<?php

namespace Mailchimp\Campaigns\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Campaigns\Types\CreateCampaignsRequestContentType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Campaigns\Types\CreateCampaignsRequestRecipients;
use Mailchimp\Campaigns\Types\CreateCampaignsRequestRssOpts;
use Mailchimp\Campaigns\Types\CreateCampaignsRequestSettings;
use Mailchimp\Campaigns\Types\CreateCampaignsRequestSocialCard;
use Mailchimp\Types\CampaignTrackingOptions;
use Mailchimp\Campaigns\Types\CreateCampaignsRequestType;
use Mailchimp\Campaigns\Types\CreateCampaignsRequestVariateSettings;

class CreateCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<CreateCampaignsRequestContentType> $contentType How the campaign's content is put together. The old drag and drop editor uses 'template' while the new editor uses 'multichannel'. Defaults to template.
     */
    #[JsonProperty('content_type')]
    public ?string $contentType;

    /**
     * @var ?CreateCampaignsRequestRecipients $recipients List settings for the campaign.
     */
    #[JsonProperty('recipients')]
    public ?CreateCampaignsRequestRecipients $recipients;

    /**
     * @var ?CreateCampaignsRequestRssOpts $rssOpts [RSS](https://mailchimp.com/help/share-your-blog-posts-with-mailchimp/) options, specific to an RSS campaign.
     */
    #[JsonProperty('rss_opts')]
    public ?CreateCampaignsRequestRssOpts $rssOpts;

    /**
     * @var ?CreateCampaignsRequestSettings $settings The settings for your campaign, including subject, from name, reply-to address, and more.
     */
    #[JsonProperty('settings')]
    public ?CreateCampaignsRequestSettings $settings;

    /**
     * @var ?CreateCampaignsRequestSocialCard $socialCard The preview for the campaign, rendered by social networks like Facebook and Twitter. [Learn more](https://mailchimp.com/help/enable-and-customize-social-cards/).
     */
    #[JsonProperty('social_card')]
    public ?CreateCampaignsRequestSocialCard $socialCard;

    /**
     * @var ?CampaignTrackingOptions $tracking
     */
    #[JsonProperty('tracking')]
    public ?CampaignTrackingOptions $tracking;

    /**
     * @var value-of<CreateCampaignsRequestType> $type There are four types of [campaigns](https://mailchimp.com/help/getting-started-with-campaigns/) you can create in Mailchimp. A/B Split campaigns have been deprecated and variate campaigns should be used instead.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?CreateCampaignsRequestVariateSettings $variateSettings The settings specific to A/B test campaigns.
     */
    #[JsonProperty('variate_settings')]
    public ?CreateCampaignsRequestVariateSettings $variateSettings;

    /**
     * @param array{
     *   type: value-of<CreateCampaignsRequestType>,
     *   contentType?: ?value-of<CreateCampaignsRequestContentType>,
     *   recipients?: ?CreateCampaignsRequestRecipients,
     *   rssOpts?: ?CreateCampaignsRequestRssOpts,
     *   settings?: ?CreateCampaignsRequestSettings,
     *   socialCard?: ?CreateCampaignsRequestSocialCard,
     *   tracking?: ?CampaignTrackingOptions,
     *   variateSettings?: ?CreateCampaignsRequestVariateSettings,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contentType = $values['contentType'] ?? null;
        $this->recipients = $values['recipients'] ?? null;
        $this->rssOpts = $values['rssOpts'] ?? null;
        $this->settings = $values['settings'] ?? null;
        $this->socialCard = $values['socialCard'] ?? null;
        $this->tracking = $values['tracking'] ?? null;
        $this->type = $values['type'];
        $this->variateSettings = $values['variateSettings'] ?? null;
    }
}
