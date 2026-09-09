<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Additional content properties.
 */
class SmsCampaignContentProperties extends JsonSerializableType
{
    /**
     * @var ?string $contentType The content type of the message.
     */
    #[JsonProperty('content_type')]
    public ?string $contentType;

    /**
     * @var ?string $sender The sender identifier for the message.
     */
    #[JsonProperty('sender')]
    public ?string $sender;

    /**
     * @var ?string $optoutMessageLanguage The language of the opt-out message.
     */
    #[JsonProperty('optout_message_language')]
    public ?string $optoutMessageLanguage;

    /**
     * @param array{
     *   contentType?: ?string,
     *   sender?: ?string,
     *   optoutMessageLanguage?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contentType = $values['contentType'] ?? null;
        $this->sender = $values['sender'] ?? null;
        $this->optoutMessageLanguage = $values['optoutMessageLanguage'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
