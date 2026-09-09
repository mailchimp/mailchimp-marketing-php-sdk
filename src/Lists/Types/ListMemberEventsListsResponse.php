<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A collection of events for a given contact
 */
class ListMemberEventsListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListMemberEventsListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListMemberEventsListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListMemberEventsListsResponseEventsItem> $events An array of objects, each representing an event.
     */
    #[JsonProperty('events'), ArrayType([ListMemberEventsListsResponseEventsItem::class])]
    public ?array $events;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListMemberEventsListsResponseLinksItem>,
     *   events?: ?array<ListMemberEventsListsResponseEventsItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->events = $values['events'] ?? null;
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
