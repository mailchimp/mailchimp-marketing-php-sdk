<?php

namespace Mailchimp\Automations\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\AutomationWorkflowEmail;

/**
 * A summary of the emails in an Automation workflow.
 */
class ListEmailsAutomationsResponse extends JsonSerializableType
{
    /**
     * @var ?array<array<ListEmailsAutomationsResponseLinksItemItem>> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([[ListEmailsAutomationsResponseLinksItemItem::class]])]
    public ?array $links;

    /**
     * @var ?array<AutomationWorkflowEmail> $emails An array of objects, each representing an email in an Automation workflow.
     */
    #[JsonProperty('emails'), ArrayType([AutomationWorkflowEmail::class])]
    public ?array $emails;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<array<ListEmailsAutomationsResponseLinksItemItem>>,
     *   emails?: ?array<AutomationWorkflowEmail>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->emails = $values['emails'] ?? null;
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
