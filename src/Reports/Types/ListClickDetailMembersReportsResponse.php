<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ClickDetailMember;

/**
 * A collection of members who clicked on a specific link within a campaign.
 */
class ListClickDetailMembersReportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListClickDetailMembersReportsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListClickDetailMembersReportsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The campaign id.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?array<ClickDetailMember> $members An array of objects, each representing a member who clicked a specific link within a campaign.
     */
    #[JsonProperty('members'), ArrayType([ClickDetailMember::class])]
    public ?array $members;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListClickDetailMembersReportsResponseLinksItem>,
     *   campaignId?: ?string,
     *   members?: ?array<ClickDetailMember>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->members = $values['members'] ?? null;
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
