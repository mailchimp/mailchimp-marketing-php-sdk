<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;
use Mailchimp\Core\Types\ArrayType;

class ReportingFacebookAd extends JsonSerializableType
{
    /**
     * @var ?string $emailSourceName
     */
    #[JsonProperty('email_source_name')]
    public ?string $emailSourceName;

    /**
     * @var ?DateTime $endTime The date and time the ad was ended in ISO 8601 format.
     */
    #[JsonProperty('end_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $endTime;

    /**
     * @var ?bool $needsAttention If the ad has a problem and needs attention.
     */
    #[JsonProperty('needs_attention')]
    public ?bool $needsAttention;

    /**
     * @var ?DateTime $pausedAt The date and time the ad was paused in ISO 8601 format.
     */
    #[JsonProperty('paused_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $pausedAt;

    /**
     * @var ?string $thumbnail The URL of the thumbnail for this outreach.
     */
    #[JsonProperty('thumbnail')]
    public ?string $thumbnail;

    /**
     * @var ?bool $wasCanceledByFacebook
     */
    #[JsonProperty('was_canceled_by_facebook')]
    public ?bool $wasCanceledByFacebook;

    /**
     * @var ?ReportingFacebookAdAudience $audience Audience settings
     */
    #[JsonProperty('audience')]
    public ?ReportingFacebookAdAudience $audience;

    /**
     * @var ?ReportingFacebookAdAudienceActivity $audienceActivity
     */
    #[JsonProperty('audience_activity')]
    public ?ReportingFacebookAdAudienceActivity $audienceActivity;

    /**
     * @var ?ReportingFacebookAdBudget $budget
     */
    #[JsonProperty('budget')]
    public ?ReportingFacebookAdBudget $budget;

    /**
     * @var ?ReportingFacebookAdChannel $channel Channel settings
     */
    #[JsonProperty('channel')]
    public ?ReportingFacebookAdChannel $channel;

    /**
     * @var ?ReportingFacebookAdReportSummary $reportSummary Report summary of facebook ad
     */
    #[JsonProperty('report_summary')]
    public ?ReportingFacebookAdReportSummary $reportSummary;

    /**
     * @var ?array<ReportingFacebookAdLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ReportingFacebookAdLinksItem::class])]
    public ?array $links;

    /**
     * @var ?DateTime $canceledAt The date and time the outreach was canceled in ISO 8601 format.
     */
    #[JsonProperty('canceled_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $canceledAt;

    /**
     * @var ?DateTime $createTime The date and time the outreach was created in ISO 8601 format.
     */
    #[JsonProperty('create_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createTime;

    /**
     * @var ?bool $hasSegment If this outreach targets a segment of your audience.
     */
    #[JsonProperty('has_segment')]
    public ?bool $hasSegment;

    /**
     * @var ?string $id Unique ID of an Outreach.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name Title or name of an Outreach.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?DateTime $publishedTime The date and time the outreach was (or will be) published in ISO 8601 format.
     */
    #[JsonProperty('published_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $publishedTime;

    /**
     * @var ?FacebookAdRecipients $recipients High level audience information for who the outreach targets.
     */
    #[JsonProperty('recipients')]
    public ?FacebookAdRecipients $recipients;

    /**
     * @var ?bool $showReport Outreach report availability. Note: This property is hotly debated in what it _should_ convey. See [MCP-1371](https://jira.mailchimp.com/browse/MCP-1371) for more context.
     */
    #[JsonProperty('show_report')]
    public ?bool $showReport;

    /**
     * @var ?DateTime $startTime The date and time the outreach was started in ISO 8601 format.
     */
    #[JsonProperty('start_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startTime;

    /**
     * @var ?value-of<FacebookAdStatus> $status The status of this outreach.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?value-of<FacebookAdType> $type The type of outreach this object is.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?DateTime $updatedAt The date and time the outreach was last updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?int $webId The ID used in the Mailchimp web application. For example, for a `regular` outreach, you can view this campaign in your Mailchimp account at `https://{dc}.admin.mailchimp.com/campaigns/show/?id={web_id}`.
     */
    #[JsonProperty('web_id')]
    public ?int $webId;

    /**
     * @param array{
     *   emailSourceName?: ?string,
     *   endTime?: ?DateTime,
     *   needsAttention?: ?bool,
     *   pausedAt?: ?DateTime,
     *   thumbnail?: ?string,
     *   wasCanceledByFacebook?: ?bool,
     *   audience?: ?ReportingFacebookAdAudience,
     *   audienceActivity?: ?ReportingFacebookAdAudienceActivity,
     *   budget?: ?ReportingFacebookAdBudget,
     *   channel?: ?ReportingFacebookAdChannel,
     *   reportSummary?: ?ReportingFacebookAdReportSummary,
     *   links?: ?array<ReportingFacebookAdLinksItem>,
     *   canceledAt?: ?DateTime,
     *   createTime?: ?DateTime,
     *   hasSegment?: ?bool,
     *   id?: ?string,
     *   name?: ?string,
     *   publishedTime?: ?DateTime,
     *   recipients?: ?FacebookAdRecipients,
     *   showReport?: ?bool,
     *   startTime?: ?DateTime,
     *   status?: ?value-of<FacebookAdStatus>,
     *   type?: ?value-of<FacebookAdType>,
     *   updatedAt?: ?DateTime,
     *   webId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailSourceName = $values['emailSourceName'] ?? null;
        $this->endTime = $values['endTime'] ?? null;
        $this->needsAttention = $values['needsAttention'] ?? null;
        $this->pausedAt = $values['pausedAt'] ?? null;
        $this->thumbnail = $values['thumbnail'] ?? null;
        $this->wasCanceledByFacebook = $values['wasCanceledByFacebook'] ?? null;
        $this->audience = $values['audience'] ?? null;
        $this->audienceActivity = $values['audienceActivity'] ?? null;
        $this->budget = $values['budget'] ?? null;
        $this->channel = $values['channel'] ?? null;
        $this->reportSummary = $values['reportSummary'] ?? null;
        $this->links = $values['links'] ?? null;
        $this->canceledAt = $values['canceledAt'] ?? null;
        $this->createTime = $values['createTime'] ?? null;
        $this->hasSegment = $values['hasSegment'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->publishedTime = $values['publishedTime'] ?? null;
        $this->recipients = $values['recipients'] ?? null;
        $this->showReport = $values['showReport'] ?? null;
        $this->startTime = $values['startTime'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
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
