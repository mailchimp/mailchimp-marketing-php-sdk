<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A summary of an individual campaign's settings and content.
 */
class Campaign extends JsonSerializableType
{
    /**
     * @var ?array<CampaignLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([CampaignLinksItem::class])]
    public ?array $links;

    /**
     * @var ?AbTestingOptions $abSplitOpts
     */
    #[JsonProperty('ab_split_opts')]
    public ?AbTestingOptions $abSplitOpts;

    /**
     * @var ?string $archiveUrl The link to the campaign's archive version.
     */
    #[JsonProperty('archive_url')]
    public ?string $archiveUrl;

    /**
     * @var ?string $contentType How the campaign's content is put together ('template', 'drag_and_drop', 'html', 'url').
     */
    #[JsonProperty('content_type')]
    public ?string $contentType;

    /**
     * @var ?DateTime $createTime The date and time the campaign was created in ISO 8601 format.
     */
    #[JsonProperty('create_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createTime;

    /**
     * @var ?CampaignDeliveryStatus $deliveryStatus Updates on campaigns in the process of sending.
     */
    #[JsonProperty('delivery_status')]
    public ?CampaignDeliveryStatus $deliveryStatus;

    /**
     * @var ?int $emailsSent The total number of emails sent for this campaign.
     */
    #[JsonProperty('emails_sent')]
    public ?int $emailsSent;

    /**
     * @var ?string $id A string that uniquely identifies this campaign.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $longArchiveUrl The original link to the campaign's archive version.
     */
    #[JsonProperty('long_archive_url')]
    public ?string $longArchiveUrl;

    /**
     * @var ?bool $needsBlockRefresh Determines if the campaign needs its blocks refreshed by opening the web-based campaign editor. Deprecated and will always return false.
     */
    #[JsonProperty('needs_block_refresh')]
    public ?bool $needsBlockRefresh;

    /**
     * @var ?string $parentCampaignId If this campaign is the child of another campaign, this identifies the parent campaign. For Example, for RSS or Automation children.
     */
    #[JsonProperty('parent_campaign_id')]
    public ?string $parentCampaignId;

    /**
     * @var ?CampaignRecipients $recipients List settings for the campaign.
     */
    #[JsonProperty('recipients')]
    public ?CampaignRecipients $recipients;

    /**
     * @var ?CampaignReportSummary $reportSummary For sent campaigns, a summary of opens and clicks.
     */
    #[JsonProperty('report_summary')]
    public ?CampaignReportSummary $reportSummary;

    /**
     * @var ?bool $resendable Determines if the campaign qualifies to be resent to non-openers.
     */
    #[JsonProperty('resendable')]
    public ?bool $resendable;

    /**
     * @var ?CampaignRssOpts $rssOpts [RSS](https://mailchimp.com/help/share-your-blog-posts-with-mailchimp/) options for a campaign.
     */
    #[JsonProperty('rss_opts')]
    public ?CampaignRssOpts $rssOpts;

    /**
     * @var ?DateTime $sendTime The date and time a campaign was sent in ISO 8601 format.
     */
    #[JsonProperty('send_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sendTime;

    /**
     * @var ?CampaignSettings $settings The settings for your campaign, including subject, from name, reply-to address, and more.
     */
    #[JsonProperty('settings')]
    public ?CampaignSettings $settings;

    /**
     * @var ?CampaignSocialCard $socialCard The preview for the campaign, rendered by social networks like Facebook and Twitter. [Learn more](https://mailchimp.com/help/enable-and-customize-social-cards/).
     */
    #[JsonProperty('social_card')]
    public ?CampaignSocialCard $socialCard;

    /**
     * @var ?value-of<CampaignStatus> $status The current status of the campaign.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?CampaignTrackingOptions $tracking
     */
    #[JsonProperty('tracking')]
    public ?CampaignTrackingOptions $tracking;

    /**
     * @var value-of<CampaignType> $type There are four types of [campaigns](https://mailchimp.com/help/getting-started-with-campaigns/) you can create in Mailchimp. A/B Split campaigns have been deprecated and variate campaigns should be used instead.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?CampaignVariateSettings $variateSettings The settings specific to A/B test campaigns.
     */
    #[JsonProperty('variate_settings')]
    public ?CampaignVariateSettings $variateSettings;

    /**
     * @var ?int $webId The ID used in the Mailchimp web application. View this campaign in your Mailchimp account at `https://{dc}.admin.mailchimp.com/campaigns/show/?id={web_id}`.
     */
    #[JsonProperty('web_id')]
    public ?int $webId;

    /**
     * @param array{
     *   type: value-of<CampaignType>,
     *   links?: ?array<CampaignLinksItem>,
     *   abSplitOpts?: ?AbTestingOptions,
     *   archiveUrl?: ?string,
     *   contentType?: ?string,
     *   createTime?: ?DateTime,
     *   deliveryStatus?: ?CampaignDeliveryStatus,
     *   emailsSent?: ?int,
     *   id?: ?string,
     *   longArchiveUrl?: ?string,
     *   needsBlockRefresh?: ?bool,
     *   parentCampaignId?: ?string,
     *   recipients?: ?CampaignRecipients,
     *   reportSummary?: ?CampaignReportSummary,
     *   resendable?: ?bool,
     *   rssOpts?: ?CampaignRssOpts,
     *   sendTime?: ?DateTime,
     *   settings?: ?CampaignSettings,
     *   socialCard?: ?CampaignSocialCard,
     *   status?: ?value-of<CampaignStatus>,
     *   tracking?: ?CampaignTrackingOptions,
     *   variateSettings?: ?CampaignVariateSettings,
     *   webId?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->links = $values['links'] ?? null;
        $this->abSplitOpts = $values['abSplitOpts'] ?? null;
        $this->archiveUrl = $values['archiveUrl'] ?? null;
        $this->contentType = $values['contentType'] ?? null;
        $this->createTime = $values['createTime'] ?? null;
        $this->deliveryStatus = $values['deliveryStatus'] ?? null;
        $this->emailsSent = $values['emailsSent'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->longArchiveUrl = $values['longArchiveUrl'] ?? null;
        $this->needsBlockRefresh = $values['needsBlockRefresh'] ?? null;
        $this->parentCampaignId = $values['parentCampaignId'] ?? null;
        $this->recipients = $values['recipients'] ?? null;
        $this->reportSummary = $values['reportSummary'] ?? null;
        $this->resendable = $values['resendable'] ?? null;
        $this->rssOpts = $values['rssOpts'] ?? null;
        $this->sendTime = $values['sendTime'] ?? null;
        $this->settings = $values['settings'] ?? null;
        $this->socialCard = $values['socialCard'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tracking = $values['tracking'] ?? null;
        $this->type = $values['type'];
        $this->variateSettings = $values['variateSettings'] ?? null;
        $this->webId = $values['webId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
