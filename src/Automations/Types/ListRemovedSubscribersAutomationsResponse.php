<?php

namespace Mailchimp\Automations\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\SubscriberRemovedFromAutomationWorkflow;

/**
 * A summary of the subscribers who were removed from an Automation workflow.
 */
class ListRemovedSubscribersAutomationsResponse extends JsonSerializableType
{
    /**
     * @var ?array<array<ListRemovedSubscribersAutomationsResponseLinksItemItem>> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([[ListRemovedSubscribersAutomationsResponseLinksItemItem::class]])]
    public ?array $links;

    /**
     * @var ?array<SubscriberRemovedFromAutomationWorkflow> $subscribers An array of objects, each representing a subscriber who was removed from an Automation workflow.
     */
    #[JsonProperty('subscribers'), ArrayType([SubscriberRemovedFromAutomationWorkflow::class])]
    public ?array $subscribers;

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
     *   links?: ?array<array<ListRemovedSubscribersAutomationsResponseLinksItemItem>>,
     *   subscribers?: ?array<SubscriberRemovedFromAutomationWorkflow>,
     *   totalItems?: ?int,
     *   workflowId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->subscribers = $values['subscribers'] ?? null;
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
