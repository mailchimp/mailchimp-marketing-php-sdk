<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * An individual message in a conversation. Conversation tracking is a feature available to paid accounts that lets you view replies to your campaigns in your Mailchimp account.
 */
class ConversationMessage extends JsonSerializableType
{
    /**
     * @var ?array<ConversationMessageLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ConversationMessageLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $conversationId A string that identifies this message's conversation
     */
    #[JsonProperty('conversation_id')]
    public ?string $conversationId;

    /**
     * @var ?string $fromEmail A label representing the email of the sender of this message
     */
    #[JsonProperty('from_email')]
    public ?string $fromEmail;

    /**
     * @var ?string $fromLabel A label representing the sender of this message
     */
    #[JsonProperty('from_label')]
    public ?string $fromLabel;

    /**
     * @var ?string $id A string that uniquely identifies this message
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?int $listId The list's web ID
     */
    #[JsonProperty('list_id')]
    public ?int $listId;

    /**
     * @var ?string $message The plain-text content of the message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $read Whether this message has been marked as read
     */
    #[JsonProperty('read')]
    public ?bool $read;

    /**
     * @var ?string $subject The subject of this message
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
     *   links?: ?array<ConversationMessageLinksItem>,
     *   conversationId?: ?string,
     *   fromEmail?: ?string,
     *   fromLabel?: ?string,
     *   id?: ?string,
     *   listId?: ?int,
     *   message?: ?string,
     *   read?: ?bool,
     *   subject?: ?string,
     *   timestamp?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->conversationId = $values['conversationId'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromLabel = $values['fromLabel'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->listId = $values['listId'] ?? null;
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
