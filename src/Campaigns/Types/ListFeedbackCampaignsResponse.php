<?php

namespace Mailchimp\Campaigns\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A summary of the comment feedback for a specific campaign.
 */
class ListFeedbackCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListFeedbackCampaignsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListFeedbackCampaignsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The unique id for the campaign.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?array<ListFeedbackCampaignsResponseFeedbackItem> $feedback A collection of feedback items for a campaign.
     */
    #[JsonProperty('feedback'), ArrayType([ListFeedbackCampaignsResponseFeedbackItem::class])]
    public ?array $feedback;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListFeedbackCampaignsResponseLinksItem>,
     *   campaignId?: ?string,
     *   feedback?: ?array<ListFeedbackCampaignsResponseFeedbackItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->feedback = $values['feedback'] ?? null;
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
