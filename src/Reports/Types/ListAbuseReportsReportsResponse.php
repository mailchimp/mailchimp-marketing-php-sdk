<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\AbuseComplaint;

/**
 * A list of abuse complaints for a specific list.
 */
class ListAbuseReportsReportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListAbuseReportsReportsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListAbuseReportsReportsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<AbuseComplaint> $abuseReports An array of objects, each representing an abuse report resource.
     */
    #[JsonProperty('abuse_reports'), ArrayType([AbuseComplaint::class])]
    public ?array $abuseReports;

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
     * @param array{
     *   links?: ?array<ListAbuseReportsReportsResponseLinksItem>,
     *   abuseReports?: ?array<AbuseComplaint>,
     *   campaignId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->abuseReports = $values['abuseReports'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
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
