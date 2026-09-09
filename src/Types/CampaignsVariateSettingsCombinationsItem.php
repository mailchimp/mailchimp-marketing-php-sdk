<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CampaignsVariateSettingsCombinationsItem extends JsonSerializableType
{
    /**
     * @var ?int $contentDescription The index of `variate_settings.contents` used.
     */
    #[JsonProperty('content_description')]
    public ?int $contentDescription;

    /**
     * @var ?int $fromName The index of `variate_settings.from_names` used.
     */
    #[JsonProperty('from_name')]
    public ?int $fromName;

    /**
     * @var ?string $id Unique ID for the combination.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?int $recipients The number of recipients for this combination.
     */
    #[JsonProperty('recipients')]
    public ?int $recipients;

    /**
     * @var ?int $replyTo The index of `variate_settings.reply_to_addresses` used.
     */
    #[JsonProperty('reply_to')]
    public ?int $replyTo;

    /**
     * @var ?int $sendTime The index of `variate_settings.send_times` used.
     */
    #[JsonProperty('send_time')]
    public ?int $sendTime;

    /**
     * @var ?int $subjectLine The index of `variate_settings.subject_lines` used.
     */
    #[JsonProperty('subject_line')]
    public ?int $subjectLine;

    /**
     * @param array{
     *   contentDescription?: ?int,
     *   fromName?: ?int,
     *   id?: ?string,
     *   recipients?: ?int,
     *   replyTo?: ?int,
     *   sendTime?: ?int,
     *   subjectLine?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contentDescription = $values['contentDescription'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->recipients = $values['recipients'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->sendTime = $values['sendTime'] ?? null;
        $this->subjectLine = $values['subjectLine'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
