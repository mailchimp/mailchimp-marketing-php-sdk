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
class Campaigns extends JsonSerializableType
{
    /**
     * @var ?array<CampaignsLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([CampaignsLinksItem::class])]
    public ?array $links;

    /**
     * @var ?AbTestingOptions $abSplitOpts
     */
    #[JsonProperty('ab_split_opts')]
    public ?AbTestingOptions $abSplitOpts;

    /**
     * @var ?string $archiveUrl The link to the campaign's archive version in ISO 8601 format.
     */
    #[JsonProperty('archive_url')]
    public ?string $archiveUrl;

    /**
     * @var ?value-of<CampaignsContentType> $contentType How the campaign's content is put together.
     */
    #[JsonProperty('content_type')]
    public ?string $contentType;

    /**
     * @var ?DateTime $createTime The date and time the campaign was created in ISO 8601 format.
     */
    #[JsonProperty('create_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createTime;

    /**
     * @var ?CampaignsDeliveryStatus $deliveryStatus Updates on campaigns in the process of sending.
     */
    #[JsonProperty('delivery_status')]
    public ?CampaignsDeliveryStatus $deliveryStatus;

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
     * @var ?CampaignsRecipients $recipients List settings for the campaign.
     */
    #[JsonProperty('recipients')]
    public ?CampaignsRecipients $recipients;

    /**
     * @var ?CampaignsReportSummary $reportSummary For sent campaigns, a summary of opens, clicks, and e-commerce data.
     */
    #[JsonProperty('report_summary')]
    public ?CampaignsReportSummary $reportSummary;

    /**
     * @var ?CampaignsResendShortcutEligibility $resendShortcutEligibility Determines if the campaign qualifies for the Campaign Resend Shortcuts. Only included when query parameter `include_resend_shortcuts` is `true`.
     */
    #[JsonProperty('resend_shortcut_eligibility')]
    public ?CampaignsResendShortcutEligibility $resendShortcutEligibility;

    /**
     * @var ?CampaignsResendShortcutUsage $resendShortcutUsage Information about campaigns related through shortcuts.
     */
    #[JsonProperty('resend_shortcut_usage')]
    public ?CampaignsResendShortcutUsage $resendShortcutUsage;

    /**
     * @var ?bool $resendable Determines if the campaign qualifies to be resent to non-openers.
     */
    #[JsonProperty('resendable')]
    public ?bool $resendable;

    /**
     * @var ?CampaignsRssOpts $rssOpts [RSS](https://mailchimp.com/help/share-your-blog-posts-with-mailchimp/) options for a campaign.
     */
    #[JsonProperty('rss_opts')]
    public ?CampaignsRssOpts $rssOpts;

    /**
     * @var ?DateTime $sendTime The date and time a campaign was sent.
     */
    #[JsonProperty('send_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sendTime;

    /**
     * @var ?CampaignsSettings $settings The settings for your campaign, including subject, from name, reply-to address, and more.
     */
    #[JsonProperty('settings')]
    public ?CampaignsSettings $settings;

    /**
     * @var ?CampaignsSocialCard $socialCard The preview for the campaign, rendered by social networks like Facebook and Twitter. [Learn more](https://mailchimp.com/help/enable-and-customize-social-cards/).
     */
    #[JsonProperty('social_card')]
    public ?CampaignsSocialCard $socialCard;

    /**
     * @var ?value-of<CampaignsStatus> $status The current status of the campaign.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?CampaignTrackingOptions $tracking
     */
    #[JsonProperty('tracking')]
    public ?CampaignTrackingOptions $tracking;

    /**
     * @var ?value-of<CampaignsType> $type There are four types of [campaigns](https://mailchimp.com/help/getting-started-with-campaigns/) you can create in Mailchimp. A/B Split campaigns have been deprecated and variate campaigns should be used instead.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?CampaignsVariateSettings $variateSettings The settings specific to A/B test campaigns.
     */
    #[JsonProperty('variate_settings')]
    public ?CampaignsVariateSettings $variateSettings;

    /**
     * @var ?int $webId The ID used in the Mailchimp web application. View this campaign in your Mailchimp account at `https://{dc}.admin.mailchimp.com/campaigns/show/?id={web_id}`.
     */
    #[JsonProperty('web_id')]
    public ?int $webId;

    /**
     * @param array{
     *   links?: ?array<CampaignsLinksItem>,
     *   abSplitOpts?: ?AbTestingOptions,
     *   archiveUrl?: ?string,
     *   contentType?: ?value-of<CampaignsContentType>,
     *   createTime?: ?DateTime,
     *   deliveryStatus?: ?CampaignsDeliveryStatus,
     *   emailsSent?: ?int,
     *   id?: ?string,
     *   longArchiveUrl?: ?string,
     *   needsBlockRefresh?: ?bool,
     *   parentCampaignId?: ?string,
     *   recipients?: ?CampaignsRecipients,
     *   reportSummary?: ?CampaignsReportSummary,
     *   resendShortcutEligibility?: ?CampaignsResendShortcutEligibility,
     *   resendShortcutUsage?: ?CampaignsResendShortcutUsage,
     *   resendable?: ?bool,
     *   rssOpts?: ?CampaignsRssOpts,
     *   sendTime?: ?DateTime,
     *   settings?: ?CampaignsSettings,
     *   socialCard?: ?CampaignsSocialCard,
     *   status?: ?value-of<CampaignsStatus>,
     *   tracking?: ?CampaignTrackingOptions,
     *   type?: ?value-of<CampaignsType>,
     *   variateSettings?: ?CampaignsVariateSettings,
     *   webId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
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
        $this->resendShortcutEligibility = $values['resendShortcutEligibility'] ?? null;
        $this->resendShortcutUsage = $values['resendShortcutUsage'] ?? null;
        $this->resendable = $values['resendable'] ?? null;
        $this->rssOpts = $values['rssOpts'] ?? null;
        $this->sendTime = $values['sendTime'] ?? null;
        $this->settings = $values['settings'] ?? null;
        $this->socialCard = $values['socialCard'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tracking = $values['tracking'] ?? null;
        $this->type = $values['type'] ?? null;
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
