<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The hours an Automation workflow can send.
 */
class AutomationWorkflowTriggerSettingsRuntimeHours extends JsonSerializableType
{
    /**
     * @var value-of<AutomationWorkflowTriggerSettingsRuntimeHoursType> $type When to send the Automation email.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   type: value-of<AutomationWorkflowTriggerSettingsRuntimeHoursType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
