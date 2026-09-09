<?php

namespace Mailchimp\Automations\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\AutomationWorkflow;

/**
 * An array of objects, each representing an Automation workflow.
 */
class ListAutomationsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListAutomationsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListAutomationsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<AutomationWorkflow> $automations An array of objects, each representing an Automation workflow.
     */
    #[JsonProperty('automations'), ArrayType([AutomationWorkflow::class])]
    public ?array $automations;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListAutomationsResponseLinksItem>,
     *   automations?: ?array<AutomationWorkflow>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->automations = $values['automations'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
