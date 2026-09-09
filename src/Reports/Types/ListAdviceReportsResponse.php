<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A list of feedback based on a campaign's statistics.
 */
class ListAdviceReportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListAdviceReportsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListAdviceReportsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListAdviceReportsResponseAdviceItem> $advice An array of objects, each representing a point of campaign feedback.
     */
    #[JsonProperty('advice'), ArrayType([ListAdviceReportsResponseAdviceItem::class])]
    public ?array $advice;

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
     *   links?: ?array<ListAdviceReportsResponseLinksItem>,
     *   advice?: ?array<ListAdviceReportsResponseAdviceItem>,
     *   campaignId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->advice = $values['advice'] ?? null;
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
