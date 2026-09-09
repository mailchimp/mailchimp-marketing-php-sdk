<?php

namespace Mailchimp\Automations\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The settings for the Automation workflow.
 */
class CreateAutomationsRequestSettings extends JsonSerializableType
{
    /**
     * @var ?string $fromName The 'from' name for the Automation (not an email address).
     */
    #[JsonProperty('from_name')]
    public ?string $fromName;

    /**
     * @var ?string $replyTo The reply-to email address for the Automation.
     */
    #[JsonProperty('reply_to')]
    public ?string $replyTo;

    /**
     * @param array{
     *   fromName?: ?string,
     *   replyTo?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fromName = $values['fromName'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
