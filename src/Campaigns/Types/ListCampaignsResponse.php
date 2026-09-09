<?php

namespace Mailchimp\Campaigns\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\Campaigns;

/**
 * An array of campaigns.
 */
class ListCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListCampaignsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListCampaignsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<Campaigns> $campaigns An array of campaigns.
     */
    #[JsonProperty('campaigns'), ArrayType([Campaigns::class])]
    public ?array $campaigns;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListCampaignsResponseLinksItem>,
     *   campaigns?: ?array<Campaigns>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaigns = $values['campaigns'] ?? null;
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
