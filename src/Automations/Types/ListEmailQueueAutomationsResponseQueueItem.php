<?php

namespace Mailchimp\Automations\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Information about subscribers in an Automation email queue.
 */
class ListEmailQueueAutomationsResponseQueueItem extends JsonSerializableType
{
    /**
     * @var ?array<array<ListEmailQueueAutomationsResponseQueueItemLinksItemItem>> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([[ListEmailQueueAutomationsResponseQueueItemLinksItemItem::class]])]
    public ?array $links;

    /**
     * @var string $emailAddress The list member's email address.
     */
    #[JsonProperty('email_address')]
    public string $emailAddress;

    /**
     * @var ?string $emailId A string that uniquely identifies an email in an Automation workflow.
     */
    #[JsonProperty('email_id')]
    public ?string $emailId;

    /**
     * @var ?string $id The MD5 hash of the lowercase version of the list member's email address.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $listId A string that uniquely identifies a list.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?DateTime $nextSend The date and time of the next send for the workflow email in ISO 8601 format.
     */
    #[JsonProperty('next_send'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $nextSend;

    /**
     * @var ?string $workflowId A string that uniquely identifies an Automation workflow.
     */
    #[JsonProperty('workflow_id')]
    public ?string $workflowId;

    /**
     * @param array{
     *   emailAddress: string,
     *   links?: ?array<array<ListEmailQueueAutomationsResponseQueueItemLinksItemItem>>,
     *   emailId?: ?string,
     *   id?: ?string,
     *   listId?: ?string,
     *   nextSend?: ?DateTime,
     *   workflowId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->links = $values['links'] ?? null;
        $this->emailAddress = $values['emailAddress'];
        $this->emailId = $values['emailId'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->nextSend = $values['nextSend'] ?? null;
        $this->workflowId = $values['workflowId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
