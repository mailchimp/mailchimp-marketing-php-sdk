<?php

namespace Mailchimp\Automations\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * An automation workflow
 */
class ListEmailQueueAutomationsResponse extends JsonSerializableType
{
    /**
     * @var ?array<array<ListEmailQueueAutomationsResponseLinksItemItem>> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([[ListEmailQueueAutomationsResponseLinksItemItem::class]])]
    public ?array $links;

    /**
     * @var ?string $emailId A string that uniquely identifies an email in an Automation workflow.
     */
    #[JsonProperty('email_id')]
    public ?string $emailId;

    /**
     * @var ?array<ListEmailQueueAutomationsResponseQueueItem> $queue An array of objects, each representing a subscriber queue for an email in an Automation workflow.
     */
    #[JsonProperty('queue'), ArrayType([ListEmailQueueAutomationsResponseQueueItem::class])]
    public ?array $queue;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @var ?string $workflowId A string that uniquely identifies an Automation workflow.
     */
    #[JsonProperty('workflow_id')]
    public ?string $workflowId;

    /**
     * @param array{
     *   links?: ?array<array<ListEmailQueueAutomationsResponseLinksItemItem>>,
     *   emailId?: ?string,
     *   queue?: ?array<ListEmailQueueAutomationsResponseQueueItem>,
     *   totalItems?: ?int,
     *   workflowId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->queue = $values['queue'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
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
