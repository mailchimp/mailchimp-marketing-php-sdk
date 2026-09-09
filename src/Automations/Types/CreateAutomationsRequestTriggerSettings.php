<?php

namespace Mailchimp\Automations\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Trigger settings for the Automation.
 */
class CreateAutomationsRequestTriggerSettings extends JsonSerializableType
{
    /**
     * @var value-of<CreateAutomationsRequestTriggerSettingsWorkflowType> $workflowType The type of Automation workflow.
     */
    #[JsonProperty('workflow_type')]
    public string $workflowType;

    /**
     * @param array{
     *   workflowType: value-of<CreateAutomationsRequestTriggerSettingsWorkflowType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
