<?php

namespace Mailchimp\ActivityFeed\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * An array of Chimp Chatter messages. There's a maximum of 200 messages present for an account.
 */
class ListChimpChatterActivityFeedResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListChimpChatterActivityFeedResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListChimpChatterActivityFeedResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListChimpChatterActivityFeedResponseChimpChatterItem> $chimpChatter An array of Chimp Chatter messages. There's a maximum of 200 messages present for an account.
     */
    #[JsonProperty('chimp_chatter'), ArrayType([ListChimpChatterActivityFeedResponseChimpChatterItem::class])]
    public ?array $chimpChatter;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListChimpChatterActivityFeedResponseLinksItem>,
     *   chimpChatter?: ?array<ListChimpChatterActivityFeedResponseChimpChatterItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->chimpChatter = $values['chimpChatter'] ?? null;
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
