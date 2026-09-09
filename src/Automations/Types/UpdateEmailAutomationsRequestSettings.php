<?php

namespace Mailchimp\Automations\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Settings for the campaign including the email subject, from name, and from email address.
 */
class UpdateEmailAutomationsRequestSettings extends JsonSerializableType
{
    /**
     * @var ?string $fromName The 'from' name for the Automation (not an email address).
     */
    #[JsonProperty('from_name')]
    public ?string $fromName;

    /**
     * @var ?string $previewText The preview text for the campaign.
     */
    #[JsonProperty('preview_text')]
    public ?string $previewText;

    /**
     * @var ?string $replyTo The reply-to email address for the Automation.
     */
    #[JsonProperty('reply_to')]
    public ?string $replyTo;

    /**
     * @var ?string $subjectLine The subject line for the campaign.
     */
    #[JsonProperty('subject_line')]
    public ?string $subjectLine;

    /**
     * @var ?string $title The title of the Automation.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   fromName?: ?string,
     *   previewText?: ?string,
     *   replyTo?: ?string,
     *   subjectLine?: ?string,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fromName = $values['fromName'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->subjectLine = $values['subjectLine'] ?? null;
        $this->title = $values['title'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
