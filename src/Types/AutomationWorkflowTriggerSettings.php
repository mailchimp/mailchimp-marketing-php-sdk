<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Available triggers for Automation workflows.
 */
class AutomationWorkflowTriggerSettings extends JsonSerializableType
{
    /**
     * @var ?AutomationWorkflowTriggerSettingsRuntime $runtime A workflow's runtime settings for an Automation.
     */
    #[JsonProperty('runtime')]
    public ?AutomationWorkflowTriggerSettingsRuntime $runtime;

    /**
     * @var ?int $workflowEmailsCount The number of emails in the Automation workflow.
     */
    #[JsonProperty('workflow_emails_count')]
    public ?int $workflowEmailsCount;

    /**
     * @var ?string $workflowTitle The title of the workflow type.
     */
    #[JsonProperty('workflow_title')]
    public ?string $workflowTitle;

    /**
     * @var value-of<AutomationWorkflowTriggerSettingsWorkflowType> $workflowType The type of Automation workflow.
     */
    #[JsonProperty('workflow_type')]
    public string $workflowType;

    /**
     * @param array{
     *   workflowType: value-of<AutomationWorkflowTriggerSettingsWorkflowType>,
     *   runtime?: ?AutomationWorkflowTriggerSettingsRuntime,
     *   workflowEmailsCount?: ?int,
     *   workflowTitle?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->runtime = $values['runtime'] ?? null;
        $this->workflowEmailsCount = $values['workflowEmailsCount'] ?? null;
        $this->workflowTitle = $values['workflowTitle'] ?? null;
        $this->workflowType = $values['workflowType'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
