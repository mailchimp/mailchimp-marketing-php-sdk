<?php

namespace Mailchimp\Automations\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Automations\Types\UpdateEmailAutomationsRequestDelay;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Automations\Types\UpdateEmailAutomationsRequestSettings;

class UpdateEmailAutomationsRequest extends JsonSerializableType
{
    /**
     * @var ?UpdateEmailAutomationsRequestDelay $delay The delay settings for an automation email.
     */
    #[JsonProperty('delay')]
    public ?UpdateEmailAutomationsRequestDelay $delay;

    /**
     * @var ?UpdateEmailAutomationsRequestSettings $settings Settings for the campaign including the email subject, from name, and from email address.
     */
    #[JsonProperty('settings')]
    public ?UpdateEmailAutomationsRequestSettings $settings;

    /**
     * @param array{
     *   delay?: ?UpdateEmailAutomationsRequestDelay,
     *   settings?: ?UpdateEmailAutomationsRequestSettings,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->delay = $values['delay'] ?? null;
        $this->settings = $values['settings'] ?? null;
    }
}
