<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Statistics for the top-performing email domains in a campaign.
 */
class ListDomainPerformanceReportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListDomainPerformanceReportsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListDomainPerformanceReportsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The unique id for the campaign.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?array<ListDomainPerformanceReportsResponseDomainsItem> $domains The top 5 email domains based on total delivered emails.
     */
    #[JsonProperty('domains'), ArrayType([ListDomainPerformanceReportsResponseDomainsItem::class])]
    public ?array $domains;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @var ?int $totalSent The total number of emails sent for the campaign.
     */
    #[JsonProperty('total_sent')]
    public ?int $totalSent;

    /**
     * @param array{
     *   links?: ?array<ListDomainPerformanceReportsResponseLinksItem>,
     *   campaignId?: ?string,
     *   domains?: ?array<ListDomainPerformanceReportsResponseDomainsItem>,
     *   totalItems?: ?int,
     *   totalSent?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->domains = $values['domains'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
        $this->totalSent = $values['totalSent'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
