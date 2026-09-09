<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\Unsubscribes;

/**
 * A list of members who have unsubscribed from a specific campaign.
 */
class ListUnsubscribedReportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListUnsubscribedReportsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListUnsubscribedReportsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The campaign id.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @var ?array<Unsubscribes> $unsubscribes An array of objects, each representing a member who unsubscribed from a campaign.
     */
    #[JsonProperty('unsubscribes'), ArrayType([Unsubscribes::class])]
    public ?array $unsubscribes;

    /**
     * @param array{
     *   links?: ?array<ListUnsubscribedReportsResponseLinksItem>,
     *   campaignId?: ?string,
     *   totalItems?: ?int,
     *   unsubscribes?: ?array<Unsubscribes>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
        $this->unsubscribes = $values['unsubscribes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
