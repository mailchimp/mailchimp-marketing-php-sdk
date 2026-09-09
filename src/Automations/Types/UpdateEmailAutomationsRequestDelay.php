<?php

namespace Mailchimp\Automations\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The delay settings for an automation email.
 */
class UpdateEmailAutomationsRequestDelay extends JsonSerializableType
{
    /**
     * @var value-of<UpdateEmailAutomationsRequestDelayAction> $action The action that triggers the delay of an automation emails.
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var ?int $amount The delay amount for an automation email.
     */
    #[JsonProperty('amount')]
    public ?int $amount;

    /**
     * @var ?value-of<UpdateEmailAutomationsRequestDelayDirection> $direction Whether the delay settings describe before or after the delay action of an automation email.
     */
    #[JsonProperty('direction')]
    public ?string $direction;

    /**
     * @var ?value-of<UpdateEmailAutomationsRequestDelayType> $type The type of delay for an automation email.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   action: value-of<UpdateEmailAutomationsRequestDelayAction>,
     *   amount?: ?int,
     *   direction?: ?value-of<UpdateEmailAutomationsRequestDelayDirection>,
     *   type?: ?value-of<UpdateEmailAutomationsRequestDelayType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->action = $values['action'];
        $this->amount = $values['amount'] ?? null;
        $this->direction = $values['direction'] ?? null;
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
