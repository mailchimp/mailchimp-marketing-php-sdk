<?php

namespace Mailchimp\LandingPages\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\LandingPage;

/**
 * A collection of landing pages.
 */
class ListLandingPagesResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListLandingPagesResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListLandingPagesResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<LandingPage> $landingPages The landing pages on the account
     */
    #[JsonProperty('landing_pages'), ArrayType([LandingPage::class])]
    public ?array $landingPages;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListLandingPagesResponseLinksItem>,
     *   landingPages?: ?array<LandingPage>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->landingPages = $values['landingPages'] ?? null;
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
