<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Report details about a sent campaign.
 */
class CampaignReport extends JsonSerializableType
{
    /**
     * @var ?array<CampaignReportLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([CampaignReportLinksItem::class])]
    public ?array $links;

    /**
     * @var ?CampaignReportAbSplit $abSplit General stats about different groups of an A/B Split campaign. Does not return information about Multivariate Campaigns.
     */
    #[JsonProperty('ab_split')]
    public ?CampaignReportAbSplit $abSplit;

    /**
     * @var ?int $abuseReports The number of abuse reports generated for this campaign.
     */
    #[JsonProperty('abuse_reports')]
    public ?int $abuseReports;

    /**
     * @var ?CampaignReportBounces $bounces An object describing the bounce summary for the campaign.
     */
    #[JsonProperty('bounces')]
    public ?CampaignReportBounces $bounces;

    /**
     * @var ?string $campaignTitle The title of the campaign.
     */
    #[JsonProperty('campaign_title')]
    public ?string $campaignTitle;

    /**
     * @var ?CampaignReportClicks $clicks An object describing the click activity for the campaign.
     */
    #[JsonProperty('clicks')]
    public ?CampaignReportClicks $clicks;

    /**
     * @var ?CampaignReportDeliveryStatus $deliveryStatus Updates on campaigns in the process of sending.
     */
    #[JsonProperty('delivery_status')]
    public ?CampaignReportDeliveryStatus $deliveryStatus;

    /**
     * @var ?CampaignReportEcommerce $ecommerce E-Commerce stats for a campaign.
     */
    #[JsonProperty('ecommerce')]
    public ?CampaignReportEcommerce $ecommerce;

    /**
     * @var ?int $emailsSent The total number of emails sent for this campaign.
     */
    #[JsonProperty('emails_sent')]
    public ?int $emailsSent;

    /**
     * @var ?CampaignReportFacebookLikes $facebookLikes An object describing campaign engagement on Facebook.
     */
    #[JsonProperty('facebook_likes')]
    public ?CampaignReportFacebookLikes $facebookLikes;

    /**
     * @var ?CampaignReportForwards $forwards An object describing the forwards and forward activity for the campaign.
     */
    #[JsonProperty('forwards')]
    public ?CampaignReportForwards $forwards;

    /**
     * @var ?string $id A string that uniquely identifies this campaign.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?CampaignReportIndustryStats $industryStats The average campaign statistics for your industry.
     */
    #[JsonProperty('industry_stats')]
    public ?CampaignReportIndustryStats $industryStats;

    /**
     * @var ?string $listId The unique list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?bool $listIsActive The status of the list used, namely if it's deleted or disabled.
     */
    #[JsonProperty('list_is_active')]
    public ?bool $listIsActive;

    /**
     * @var ?string $listName The name of the list.
     */
    #[JsonProperty('list_name')]
    public ?string $listName;

    /**
     * @var ?CampaignReportListStats $listStats The average campaign statistics for your list. This won't be present if we haven't calculated it yet for this list.
     */
    #[JsonProperty('list_stats')]
    public ?CampaignReportListStats $listStats;

    /**
     * @var ?CampaignReportOpens $opens An object describing the open activity for the campaign.
     */
    #[JsonProperty('opens')]
    public ?CampaignReportOpens $opens;

    /**
     * @var ?string $previewText The preview text for the campaign.
     */
    #[JsonProperty('preview_text')]
    public ?string $previewText;

    /**
     * @var ?DateTime $rssLastSend For RSS campaigns, the date and time of the last send in ISO 8601 format.
     */
    #[JsonProperty('rss_last_send'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $rssLastSend;

    /**
     * @var ?DateTime $sendTime The date and time a campaign was sent in ISO 8601 format.
     */
    #[JsonProperty('send_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sendTime;

    /**
     * @var ?CampaignReportShareReport $shareReport The url and password for the [VIP report](https://mailchimp.com/help/share-a-campaign-report/).
     */
    #[JsonProperty('share_report')]
    public ?CampaignReportShareReport $shareReport;

    /**
     * @var ?string $subjectLine The subject line for the campaign.
     */
    #[JsonProperty('subject_line')]
    public ?string $subjectLine;

    /**
     * @var ?array<CampaignReportTimeseriesItem> $timeseries An hourly breakdown of the performance of the campaign over the first 24 hours.
     */
    #[JsonProperty('timeseries'), ArrayType([CampaignReportTimeseriesItem::class])]
    public ?array $timeseries;

    /**
     * @var ?array<CampaignReportTimewarpItem> $timewarp An hourly breakdown of sends, opens, and clicks if a campaign is sent using timewarp.
     */
    #[JsonProperty('timewarp'), ArrayType([CampaignReportTimewarpItem::class])]
    public ?array $timewarp;

    /**
     * @var ?string $type The type of campaign (regular, plain-text, ab_split, rss, automation, variate, or auto).
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?int $unsubscribed The total number of unsubscribed members for this campaign.
     */
    #[JsonProperty('unsubscribed')]
    public ?int $unsubscribed;

    /**
     * @param array{
     *   links?: ?array<CampaignReportLinksItem>,
     *   abSplit?: ?CampaignReportAbSplit,
     *   abuseReports?: ?int,
     *   bounces?: ?CampaignReportBounces,
     *   campaignTitle?: ?string,
     *   clicks?: ?CampaignReportClicks,
     *   deliveryStatus?: ?CampaignReportDeliveryStatus,
     *   ecommerce?: ?CampaignReportEcommerce,
     *   emailsSent?: ?int,
     *   facebookLikes?: ?CampaignReportFacebookLikes,
     *   forwards?: ?CampaignReportForwards,
     *   id?: ?string,
     *   industryStats?: ?CampaignReportIndustryStats,
     *   listId?: ?string,
     *   listIsActive?: ?bool,
     *   listName?: ?string,
     *   listStats?: ?CampaignReportListStats,
     *   opens?: ?CampaignReportOpens,
     *   previewText?: ?string,
     *   rssLastSend?: ?DateTime,
     *   sendTime?: ?DateTime,
     *   shareReport?: ?CampaignReportShareReport,
     *   subjectLine?: ?string,
     *   timeseries?: ?array<CampaignReportTimeseriesItem>,
     *   timewarp?: ?array<CampaignReportTimewarpItem>,
     *   type?: ?string,
     *   unsubscribed?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->abSplit = $values['abSplit'] ?? null;
        $this->abuseReports = $values['abuseReports'] ?? null;
        $this->bounces = $values['bounces'] ?? null;
        $this->campaignTitle = $values['campaignTitle'] ?? null;
        $this->clicks = $values['clicks'] ?? null;
        $this->deliveryStatus = $values['deliveryStatus'] ?? null;
        $this->ecommerce = $values['ecommerce'] ?? null;
        $this->emailsSent = $values['emailsSent'] ?? null;
        $this->facebookLikes = $values['facebookLikes'] ?? null;
        $this->forwards = $values['forwards'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->industryStats = $values['industryStats'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->listIsActive = $values['listIsActive'] ?? null;
        $this->listName = $values['listName'] ?? null;
        $this->listStats = $values['listStats'] ?? null;
        $this->opens = $values['opens'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->rssLastSend = $values['rssLastSend'] ?? null;
        $this->sendTime = $values['sendTime'] ?? null;
        $this->shareReport = $values['shareReport'] ?? null;
        $this->subjectLine = $values['subjectLine'] ?? null;
        $this->timeseries = $values['timeseries'] ?? null;
        $this->timewarp = $values['timewarp'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->unsubscribed = $values['unsubscribed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
