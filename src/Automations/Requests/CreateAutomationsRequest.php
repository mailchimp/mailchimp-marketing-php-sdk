<?php

namespace Mailchimp\Automations\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Automations\Types\CreateAutomationsRequestRecipients;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Automations\Types\CreateAutomationsRequestSettings;
use Mailchimp\Automations\Types\CreateAutomationsRequestTriggerSettings;

class CreateAutomationsRequest extends JsonSerializableType
{
    /**
     * @var CreateAutomationsRequestRecipients $recipients List settings for the Automation.
     */
    #[JsonProperty('recipients')]
    public CreateAutomationsRequestRecipients $recipients;

    /**
     * @var ?CreateAutomationsRequestSettings $settings The settings for the Automation workflow.
     */
    #[JsonProperty('settings')]
    public ?CreateAutomationsRequestSettings $settings;

    /**
     * @var CreateAutomationsRequestTriggerSettings $triggerSettings Trigger settings for the Automation.
     */
    #[JsonProperty('trigger_settings')]
    public CreateAutomationsRequestTriggerSettings $triggerSettings;

    /**
     * @param array{
     *   recipients: CreateAutomationsRequestRecipients,
     *   triggerSettings: CreateAutomationsRequestTriggerSettings,
     *   settings?: ?CreateAutomationsRequestSettings,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->recipients = $values['recipients'];
        $this->settings = $values['settings'] ?? null;
        $this->triggerSettings = $values['triggerSettings'];
    }
}
