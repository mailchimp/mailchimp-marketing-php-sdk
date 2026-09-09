<?php

namespace Mailchimp\Reporting\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ReportingFacebookAd;

/**
 * A collection of Facebook ads.
 */
class ListFacebookAdsReportingResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListFacebookAdsReportingResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListFacebookAdsReportingResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ReportingFacebookAd> $facebookAds
     */
    #[JsonProperty('facebook_ads'), ArrayType([ReportingFacebookAd::class])]
    public ?array $facebookAds;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListFacebookAdsReportingResponseLinksItem>,
     *   facebookAds?: ?array<ReportingFacebookAd>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->facebookAds = $values['facebookAds'] ?? null;
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
