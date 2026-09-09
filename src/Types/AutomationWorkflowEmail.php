<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A summary of an individual Automation workflow email.
 */
class AutomationWorkflowEmail extends JsonSerializableType
{
    /**
     * @var ?array<AutomationWorkflowEmailLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([AutomationWorkflowEmailLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $archiveUrl The link to the campaign's archive version in ISO 8601 format.
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
     * @var ?AutomationWorkflowEmailDelay $delay The delay settings for an Automation email.
     */
    #[JsonProperty('delay')]
    public ?AutomationWorkflowEmailDelay $delay;

    /**
     * @var ?int $emailsSent The total number of emails sent for this campaign.
     */
    #[JsonProperty('emails_sent')]
    public ?int $emailsSent;

    /**
     * @var ?bool $hasLogoMergeTag Determines if the campaign contains the *|BRAND:LOGO|* merge tag.
     */
    #[JsonProperty('has_logo_merge_tag')]
    public ?bool $hasLogoMergeTag;

    /**
     * @var ?string $id A string that uniquely identifies the Automation email.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $needsBlockRefresh Determines if the automation email needs its blocks refreshed by opening the web-based campaign editor.
     */
    #[JsonProperty('needs_block_refresh')]
    public ?bool $needsBlockRefresh;

    /**
     * @var ?int $position The position of an Automation email in a workflow.
     */
    #[JsonProperty('position')]
    public ?int $position;

    /**
     * @var ?AutomationWorkflowEmailRecipients $recipients List settings for the campaign.
     */
    #[JsonProperty('recipients')]
    public ?AutomationWorkflowEmailRecipients $recipients;

    /**
     * @var ?AutomationWorkflowEmailReportSummary $reportSummary For sent campaigns, a summary of opens and clicks.
     */
    #[JsonProperty('report_summary')]
    public ?AutomationWorkflowEmailReportSummary $reportSummary;

    /**
     * @var ?DateTime $sendTime  The date and time a campaign was sent in ISO 8601 format
     */
    #[JsonProperty('send_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sendTime;

    /**
     * @var ?AutomationWorkflowEmailSettings $settings Settings for the campaign including the email subject, from name, and from email address.
     */
    #[JsonProperty('settings')]
    public ?AutomationWorkflowEmailSettings $settings;

    /**
     * @var ?AutomationWorkflowEmailSocialCard $socialCard The preview for the campaign, rendered by social networks like Facebook and Twitter. [Learn more](https://mailchimp.com/help/enable-and-customize-social-cards/).
     */
    #[JsonProperty('social_card')]
    public ?AutomationWorkflowEmailSocialCard $socialCard;

    /**
     * @var ?DateTime $startTime The date and time the campaign was started in ISO 8601 format.
     */
    #[JsonProperty('start_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startTime;

    /**
     * @var ?value-of<AutomationWorkflowEmailStatus> $status The current status of the campaign.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?AutomationWorkflowEmailTracking $tracking The tracking options for a campaign.
     */
    #[JsonProperty('tracking')]
    public ?AutomationWorkflowEmailTracking $tracking;

    /**
     * @var ?AutomationWorkflowEmailTriggerSettings $triggerSettings Available triggers for Automation workflows.
     */
    #[JsonProperty('trigger_settings')]
    public ?AutomationWorkflowEmailTriggerSettings $triggerSettings;

    /**
     * @var ?int $webId The ID used in the Mailchimp web application. View this automation in your Mailchimp account at `https://{dc}.admin.mailchimp.com/campaigns/show/?id={web_id}`.
     */
    #[JsonProperty('web_id')]
    public ?int $webId;

    /**
     * @var ?string $workflowId A string that uniquely identifies an Automation workflow.
     */
    #[JsonProperty('workflow_id')]
    public ?string $workflowId;

    /**
     * @param array{
     *   links?: ?array<AutomationWorkflowEmailLinksItem>,
     *   archiveUrl?: ?string,
     *   contentType?: ?string,
     *   createTime?: ?DateTime,
     *   delay?: ?AutomationWorkflowEmailDelay,
     *   emailsSent?: ?int,
     *   hasLogoMergeTag?: ?bool,
     *   id?: ?string,
     *   needsBlockRefresh?: ?bool,
     *   position?: ?int,
     *   recipients?: ?AutomationWorkflowEmailRecipients,
     *   reportSummary?: ?AutomationWorkflowEmailReportSummary,
     *   sendTime?: ?DateTime,
     *   settings?: ?AutomationWorkflowEmailSettings,
     *   socialCard?: ?AutomationWorkflowEmailSocialCard,
     *   startTime?: ?DateTime,
     *   status?: ?value-of<AutomationWorkflowEmailStatus>,
     *   tracking?: ?AutomationWorkflowEmailTracking,
     *   triggerSettings?: ?AutomationWorkflowEmailTriggerSettings,
     *   webId?: ?int,
     *   workflowId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->archiveUrl = $values['archiveUrl'] ?? null;
        $this->contentType = $values['contentType'] ?? null;
        $this->createTime = $values['createTime'] ?? null;
        $this->delay = $values['delay'] ?? null;
        $this->emailsSent = $values['emailsSent'] ?? null;
        $this->hasLogoMergeTag = $values['hasLogoMergeTag'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->needsBlockRefresh = $values['needsBlockRefresh'] ?? null;
        $this->position = $values['position'] ?? null;
        $this->recipients = $values['recipients'] ?? null;
        $this->reportSummary = $values['reportSummary'] ?? null;
        $this->sendTime = $values['sendTime'] ?? null;
        $this->settings = $values['settings'] ?? null;
        $this->socialCard = $values['socialCard'] ?? null;
        $this->startTime = $values['startTime'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tracking = $values['tracking'] ?? null;
        $this->triggerSettings = $values['triggerSettings'] ?? null;
        $this->webId = $values['webId'] ?? null;
        $this->workflowId = $values['workflowId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
