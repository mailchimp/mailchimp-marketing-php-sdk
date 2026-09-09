<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The delay settings for an Automation email.
 */
class AutomationWorkflowEmailDelay extends JsonSerializableType
{
    /**
     * @var ?value-of<AutomationWorkflowEmailDelayAction> $action The action that triggers the delay of an Automation email.
     */
    #[JsonProperty('action')]
    public ?string $action;

    /**
     * @var ?string $actionDescription The user-friendly description of the action that triggers an Automation email.
     */
    #[JsonProperty('action_description')]
    public ?string $actionDescription;

    /**
     * @var ?int $amount The delay amount for an Automation email.
     */
    #[JsonProperty('amount')]
    public ?int $amount;

    /**
     * @var ?value-of<AutomationWorkflowEmailDelayDirection> $direction Whether the delay settings describe before or after the delay action of an Automation email.
     */
    #[JsonProperty('direction')]
    public ?string $direction;

    /**
     * @var ?string $fullDescription The user-friendly description of the delay and trigger action settings for an Automation email.
     */
    #[JsonProperty('full_description')]
    public ?string $fullDescription;

    /**
     * @var ?value-of<AutomationWorkflowEmailDelayType> $type The type of delay for an Automation email.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   action?: ?value-of<AutomationWorkflowEmailDelayAction>,
     *   actionDescription?: ?string,
     *   amount?: ?int,
     *   direction?: ?value-of<AutomationWorkflowEmailDelayDirection>,
     *   fullDescription?: ?string,
     *   type?: ?value-of<AutomationWorkflowEmailDelayType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->action = $values['action'] ?? null;
        $this->actionDescription = $values['actionDescription'] ?? null;
        $this->amount = $values['amount'] ?? null;
        $this->direction = $values['direction'] ?? null;
        $this->fullDescription = $values['fullDescription'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
