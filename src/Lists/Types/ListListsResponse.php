<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\SubscriberList;

/**
 * A collection of subscriber lists for this account.
 */
class ListListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?ListListsResponseConstraints $constraints Do particular authorization constraints around this collection limit creation of new instances?
     */
    #[JsonProperty('constraints')]
    public ?ListListsResponseConstraints $constraints;

    /**
     * @var array<SubscriberList> $lists An array of objects, each representing a list.
     */
    #[JsonProperty('lists'), ArrayType([SubscriberList::class])]
    public array $lists;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   lists: array<SubscriberList>,
     *   links?: ?array<ListListsResponseLinksItem>,
     *   constraints?: ?ListListsResponseConstraints,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->links = $values['links'] ?? null;
        $this->constraints = $values['constraints'] ?? null;
        $this->lists = $values['lists'];
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
