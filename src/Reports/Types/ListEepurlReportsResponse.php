<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A summary of social activity for the campaign, tracked by EepURL.
 */
class ListEepurlReportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListEepurlReportsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListEepurlReportsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The unique id for the campaign.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?ListEepurlReportsResponseClicks $clicks A summary of the click-throughs on the campaign's URL.
     */
    #[JsonProperty('clicks')]
    public ?ListEepurlReportsResponseClicks $clicks;

    /**
     * @var ?string $eepurl The shortened link used for tracking.
     */
    #[JsonProperty('eepurl')]
    public ?string $eepurl;

    /**
     * @var ?array<ListEepurlReportsResponseReferrersItem> $referrers A summary of the top referrers for the campaign.
     */
    #[JsonProperty('referrers'), ArrayType([ListEepurlReportsResponseReferrersItem::class])]
    public ?array $referrers;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @var ?ListEepurlReportsResponseTwitter $twitter A summary of Twitter activity for a campaign.
     */
    #[JsonProperty('twitter')]
    public ?ListEepurlReportsResponseTwitter $twitter;

    /**
     * @param array{
     *   links?: ?array<ListEepurlReportsResponseLinksItem>,
     *   campaignId?: ?string,
     *   clicks?: ?ListEepurlReportsResponseClicks,
     *   eepurl?: ?string,
     *   referrers?: ?array<ListEepurlReportsResponseReferrersItem>,
     *   totalItems?: ?int,
     *   twitter?: ?ListEepurlReportsResponseTwitter,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->clicks = $values['clicks'] ?? null;
        $this->eepurl = $values['eepurl'] ?? null;
        $this->referrers = $values['referrers'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
        $this->twitter = $values['twitter'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
