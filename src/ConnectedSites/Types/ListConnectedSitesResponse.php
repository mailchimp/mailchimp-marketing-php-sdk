<?php

namespace Mailchimp\ConnectedSites\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ConnectedSite;

/**
 * A collection of connected sites in the account.
 */
class ListConnectedSitesResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListConnectedSitesResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListConnectedSitesResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ConnectedSite> $sites An array of objects, each representing a connected site.
     */
    #[JsonProperty('sites'), ArrayType([ConnectedSite::class])]
    public ?array $sites;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListConnectedSitesResponseLinksItem>,
     *   sites?: ?array<ConnectedSite>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->sites = $values['sites'] ?? null;
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
