<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\OpenActivity;

/**
 * A detailed report of any campaign emails that were opened by a list member.
 */
class ListOpenDetailsReportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListOpenDetailsReportsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListOpenDetailsReportsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The campaign id.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?array<OpenActivity> $members An array of objects, each representing a list member who opened a campaign email. Each members object will contain information about the number of total opens by a single member, as well as timestamps for each open event.
     */
    #[JsonProperty('members'), ArrayType([OpenActivity::class])]
    public ?array $members;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @var ?int $totalOpens The total number of opens matching the query regardless of pagination.
     */
    #[JsonProperty('total_opens')]
    public ?int $totalOpens;

    /**
     * @var ?int $totalProxyExcludedOpens The total number of opens excluding opens from email clients that use proxies regardless of pagination.
     */
    #[JsonProperty('total_proxy_excluded_opens')]
    public ?int $totalProxyExcludedOpens;

    /**
     * @param array{
     *   links?: ?array<ListOpenDetailsReportsResponseLinksItem>,
     *   campaignId?: ?string,
     *   members?: ?array<OpenActivity>,
     *   totalItems?: ?int,
     *   totalOpens?: ?int,
     *   totalProxyExcludedOpens?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->members = $values['members'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
        $this->totalOpens = $values['totalOpens'] ?? null;
        $this->totalProxyExcludedOpens = $values['totalProxyExcludedOpens'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
