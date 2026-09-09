<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * The most recent message in the conversation.
 */
class ConversationLastMessage extends JsonSerializableType
{
    /**
     * @var ?string $fromEmail A label representing the email of the sender of this message.
     */
    #[JsonProperty('from_email')]
    public ?string $fromEmail;

    /**
     * @var ?string $fromLabel A label representing the sender of this message.
     */
    #[JsonProperty('from_label')]
    public ?string $fromLabel;

    /**
     * @var ?string $message The plain-text content of the message.
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $read Whether this message has been marked as read.
     */
    #[JsonProperty('read')]
    public ?bool $read;

    /**
     * @var ?string $subject The subject of this message.
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?DateTime $timestamp The date and time the message was either sent or received in ISO 8601 format.
     */
    #[JsonProperty('timestamp'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $timestamp;

    /**
     * @param array{
     *   fromEmail?: ?string,
     *   fromLabel?: ?string,
     *   message?: ?string,
     *   read?: ?bool,
     *   subject?: ?string,
     *   timestamp?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromLabel = $values['fromLabel'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->read = $values['read'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->timestamp = $values['timestamp'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
