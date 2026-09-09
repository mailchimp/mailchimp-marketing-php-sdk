<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A workflow's runtime settings for an Automation.
 */
class AutomationWorkflowTriggerSettingsRuntime extends JsonSerializableType
{
    /**
     * @var ?array<value-of<AutomationWorkflowTriggerSettingsRuntimeDaysItem>> $days The days an Automation workflow can send.
     */
    #[JsonProperty('days'), ArrayType(['string'])]
    public ?array $days;

    /**
     * @var ?AutomationWorkflowTriggerSettingsRuntimeHours $hours The hours an Automation workflow can send.
     */
    #[JsonProperty('hours')]
    public ?AutomationWorkflowTriggerSettingsRuntimeHours $hours;

    /**
     * @param array{
     *   days?: ?array<value-of<AutomationWorkflowTriggerSettingsRuntimeDaysItem>>,
     *   hours?: ?AutomationWorkflowTriggerSettingsRuntimeHours,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->days = $values['days'] ?? null;
        $this->hours = $values['hours'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
