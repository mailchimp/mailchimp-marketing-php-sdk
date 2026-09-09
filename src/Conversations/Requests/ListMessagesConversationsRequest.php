<?php

namespace Mailchimp\Conversations\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Conversations\Types\ListMessagesConversationsRequestIsRead;
use DateTime;

class ListMessagesConversationsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $fields A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     */
    public ?array $fields;

    /**
     * @var ?array<string> $excludeFields A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     */
    public ?array $excludeFields;

    /**
     * @var ?value-of<ListMessagesConversationsRequestIsRead> $isRead Whether a conversation message has been marked as read.
     */
    public ?string $isRead;

    /**
     * @var ?DateTime $beforeTimestamp Restrict the response to messages created before the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?DateTime $beforeTimestamp;

    /**
     * @var ?DateTime $sinceTimestamp Restrict the response to messages created after the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?DateTime $sinceTimestamp;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   isRead?: ?value-of<ListMessagesConversationsRequestIsRead>,
     *   beforeTimestamp?: ?DateTime,
     *   sinceTimestamp?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->isRead = $values['isRead'] ?? null;
        $this->beforeTimestamp = $values['beforeTimestamp'] ?? null;
        $this->sinceTimestamp = $values['sinceTimestamp'] ?? null;
    }
}
