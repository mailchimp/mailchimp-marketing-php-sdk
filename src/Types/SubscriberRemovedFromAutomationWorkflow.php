<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A summary of a subscriber removed from an Automation workflow.
 */
class SubscriberRemovedFromAutomationWorkflow extends JsonSerializableType
{
    /**
     * @var ?array<array<SubscriberRemovedFromAutomationWorkflowLinksItemItem>> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([[SubscriberRemovedFromAutomationWorkflowLinksItemItem::class]])]
    public ?array $links;

    /**
     * @var ?string $emailAddress The list member's email address.
     */
    #[JsonProperty('email_address')]
    public ?string $emailAddress;

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
     * @var ?string $workflowId A string that uniquely identifies an Automation workflow.
     */
    #[JsonProperty('workflow_id')]
    public ?string $workflowId;

    /**
     * @param array{
     *   links?: ?array<array<SubscriberRemovedFromAutomationWorkflowLinksItemItem>>,
     *   emailAddress?: ?string,
     *   id?: ?string,
     *   listId?: ?string,
     *   workflowId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->listId = $values['listId'] ?? null;
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
