<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Details about an individual conversation. Conversation tracking is a feature available to paid accounts that lets you view replies to your campaigns in your Mailchimp account.
 */
class Conversation extends JsonSerializableType
{
    /**
     * @var ?array<ConversationLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ConversationLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The unique identifier of the campaign for this conversation.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

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
     * @var ?string $id A string that uniquely identifies this conversation.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?ConversationLastMessage $lastMessage The most recent message in the conversation.
     */
    #[JsonProperty('last_message')]
    public ?ConversationLastMessage $lastMessage;

    /**
     * @var ?string $listId The unique identifier of the list for this conversation.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?int $messageCount The total number of messages in this conversation.
     */
    #[JsonProperty('message_count')]
    public ?int $messageCount;

    /**
     * @var ?string $subject The subject of the message.
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?int $unreadMessages The number of unread messages in this conversation.
     */
    #[JsonProperty('unread_messages')]
    public ?int $unreadMessages;

    /**
     * @param array{
     *   links?: ?array<ConversationLinksItem>,
     *   campaignId?: ?string,
     *   fromEmail?: ?string,
     *   fromLabel?: ?string,
     *   id?: ?string,
     *   lastMessage?: ?ConversationLastMessage,
     *   listId?: ?string,
     *   messageCount?: ?int,
     *   subject?: ?string,
     *   unreadMessages?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->fromEmail = $values['fromEmail'] ?? null;
        $this->fromLabel = $values['fromLabel'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lastMessage = $values['lastMessage'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->messageCount = $values['messageCount'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->unreadMessages = $values['unreadMessages'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
