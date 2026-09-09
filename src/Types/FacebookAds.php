<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Traits\FacebookAd;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;
use Mailchimp\Core\Types\ArrayType;

class FacebookAds extends JsonSerializableType
{
    use FacebookAd;

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
     * @var ?FacebookAdsAudience $audience Audience settings
     */
    #[JsonProperty('audience')]
    public ?FacebookAdsAudience $audience;

    /**
     * @var ?FacebookAdsBudget $budget
     */
    #[JsonProperty('budget')]
    public ?FacebookAdsBudget $budget;

    /**
     * @var ?FacebookAdsChannel $channel Channel settings
     */
    #[JsonProperty('channel')]
    public ?FacebookAdsChannel $channel;

    /**
     * @var ?FacebookAdsContent $content
     */
    #[JsonProperty('content')]
    public ?FacebookAdsContent $content;

    /**
     * @var ?FacebookAdsFeedback $feedback Check if this ad is connected to a facebook page
     */
    #[JsonProperty('feedback')]
    public ?FacebookAdsFeedback $feedback;

    /**
     * @var ?bool $hasAudience Check if this ad has audience setup
     */
    #[JsonProperty('has_audience')]
    public ?bool $hasAudience;

    /**
     * @var ?bool $hasContent Check if this ad has content
     */
    #[JsonProperty('has_content')]
    public ?bool $hasContent;

    /**
     * @var ?bool $isConnected Check if this ad is connected to a facebook page
     */
    #[JsonProperty('is_connected')]
    public ?bool $isConnected;

    /**
     * @var ?FacebookAdsSite $site Connected Site
     */
    #[JsonProperty('site')]
    public ?FacebookAdsSite $site;

    /**
     * @var ?array<FacebookAdsLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([FacebookAdsLinksItem::class])]
    public ?array $links;

    /**
     * @param array{
     *   canceledAt?: ?DateTime,
     *   createTime?: ?DateTime,
     *   hasSegment?: ?bool,
     *   id?: ?string,
     *   name?: ?string,
     *   publishedTime?: ?DateTime,
     *   recipients?: ?FacebookAdRecipients,
     *   reportSummary?: ?FacebookAdReportSummary,
     *   showReport?: ?bool,
     *   startTime?: ?DateTime,
     *   status?: ?value-of<FacebookAdStatus>,
     *   type?: ?value-of<FacebookAdType>,
     *   updatedAt?: ?DateTime,
     *   webId?: ?int,
     *   emailSourceName?: ?string,
     *   endTime?: ?DateTime,
     *   needsAttention?: ?bool,
     *   pausedAt?: ?DateTime,
     *   thumbnail?: ?string,
     *   wasCanceledByFacebook?: ?bool,
     *   audience?: ?FacebookAdsAudience,
     *   budget?: ?FacebookAdsBudget,
     *   channel?: ?FacebookAdsChannel,
     *   content?: ?FacebookAdsContent,
     *   feedback?: ?FacebookAdsFeedback,
     *   hasAudience?: ?bool,
     *   hasContent?: ?bool,
     *   isConnected?: ?bool,
     *   site?: ?FacebookAdsSite,
     *   links?: ?array<FacebookAdsLinksItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->canceledAt = $values['canceledAt'] ?? null;
        $this->createTime = $values['createTime'] ?? null;
        $this->hasSegment = $values['hasSegment'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->publishedTime = $values['publishedTime'] ?? null;
        $this->recipients = $values['recipients'] ?? null;
        $this->reportSummary = $values['reportSummary'] ?? null;
        $this->showReport = $values['showReport'] ?? null;
        $this->startTime = $values['startTime'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->webId = $values['webId'] ?? null;
        $this->emailSourceName = $values['emailSourceName'] ?? null;
        $this->endTime = $values['endTime'] ?? null;
        $this->needsAttention = $values['needsAttention'] ?? null;
        $this->pausedAt = $values['pausedAt'] ?? null;
        $this->thumbnail = $values['thumbnail'] ?? null;
        $this->wasCanceledByFacebook = $values['wasCanceledByFacebook'] ?? null;
        $this->audience = $values['audience'] ?? null;
        $this->budget = $values['budget'] ?? null;
        $this->channel = $values['channel'] ?? null;
        $this->content = $values['content'] ?? null;
        $this->feedback = $values['feedback'] ?? null;
        $this->hasAudience = $values['hasAudience'] ?? null;
        $this->hasContent = $values['hasContent'] ?? null;
        $this->isConnected = $values['isConnected'] ?? null;
        $this->site = $values['site'] ?? null;
        $this->links = $values['links'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
