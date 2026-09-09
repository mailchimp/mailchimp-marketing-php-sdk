<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A summary of an individual Automation workflow's settings and content.
 */
class AutomationWorkflow extends JsonSerializableType
{
    /**
     * @var ?array<AutomationWorkflowLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([AutomationWorkflowLinksItem::class])]
    public ?array $links;

    /**
     * @var ?DateTime $createTime The date and time the Automation was created in ISO 8601 format.
     */
    #[JsonProperty('create_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createTime;

    /**
     * @var ?int $emailsSent The total number of emails sent for the Automation.
     */
    #[JsonProperty('emails_sent')]
    public ?int $emailsSent;

    /**
     * @var ?string $id A string that identifies the Automation.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?AutomationWorkflowRecipients $recipients List settings for the Automation.
     */
    #[JsonProperty('recipients')]
    public ?AutomationWorkflowRecipients $recipients;

    /**
     * @var ?AutomationWorkflowReportSummary $reportSummary A summary of opens and clicks for sent campaigns.
     */
    #[JsonProperty('report_summary')]
    public ?AutomationWorkflowReportSummary $reportSummary;

    /**
     * @var ?AutomationWorkflowSettings $settings The settings for the Automation workflow.
     */
    #[JsonProperty('settings')]
    public ?AutomationWorkflowSettings $settings;

    /**
     * @var ?DateTime $startTime The date and time the Automation was started in ISO 8601 format.
     */
    #[JsonProperty('start_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startTime;

    /**
     * @var ?value-of<AutomationWorkflowStatus> $status The current status of the Automation.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?AutomationWorkflowTracking $tracking The tracking options for the Automation.
     */
    #[JsonProperty('tracking')]
    public ?AutomationWorkflowTracking $tracking;

    /**
     * @var ?AutomationWorkflowTriggerSettings $triggerSettings Available triggers for Automation workflows.
     */
    #[JsonProperty('trigger_settings')]
    public ?AutomationWorkflowTriggerSettings $triggerSettings;

    /**
     * @param array{
     *   links?: ?array<AutomationWorkflowLinksItem>,
     *   createTime?: ?DateTime,
     *   emailsSent?: ?int,
     *   id?: ?string,
     *   recipients?: ?AutomationWorkflowRecipients,
     *   reportSummary?: ?AutomationWorkflowReportSummary,
     *   settings?: ?AutomationWorkflowSettings,
     *   startTime?: ?DateTime,
     *   status?: ?value-of<AutomationWorkflowStatus>,
     *   tracking?: ?AutomationWorkflowTracking,
     *   triggerSettings?: ?AutomationWorkflowTriggerSettings,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->createTime = $values['createTime'] ?? null;
        $this->emailsSent = $values['emailsSent'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->recipients = $values['recipients'] ?? null;
        $this->reportSummary = $values['reportSummary'] ?? null;
        $this->settings = $values['settings'] ?? null;
        $this->startTime = $values['startTime'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tracking = $values['tracking'] ?? null;
        $this->triggerSettings = $values['triggerSettings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
