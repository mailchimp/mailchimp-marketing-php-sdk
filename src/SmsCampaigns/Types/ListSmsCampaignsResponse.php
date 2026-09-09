<?php

namespace Mailchimp\SmsCampaigns\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Types\SmsCampaign;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A collection of SMS campaigns.
 */
class ListSmsCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?array<SmsCampaign> $smsCampaigns An array of SMS campaigns.
     */
    #[JsonProperty('sms_campaigns'), ArrayType([SmsCampaign::class])]
    public ?array $smsCampaigns;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @var ?array<ListSmsCampaignsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListSmsCampaignsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @param array{
     *   smsCampaigns?: ?array<SmsCampaign>,
     *   totalItems?: ?int,
     *   links?: ?array<ListSmsCampaignsResponseLinksItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->smsCampaigns = $values['smsCampaigns'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
        $this->links = $values['links'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
