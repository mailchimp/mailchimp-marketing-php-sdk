<?php

namespace Mailchimp\FacebookAds\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\FacebookAds;

/**
 * Contains an array of facebook ads.
 */
class ListFacebookAdsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListFacebookAdsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListFacebookAdsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<FacebookAds> $facebookAds
     */
    #[JsonProperty('facebook_ads'), ArrayType([FacebookAds::class])]
    public ?array $facebookAds;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListFacebookAdsResponseLinksItem>,
     *   facebookAds?: ?array<FacebookAds>,
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
