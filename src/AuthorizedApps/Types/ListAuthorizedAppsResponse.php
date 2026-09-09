<?php

namespace Mailchimp\AuthorizedApps\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * An array of objects, each representing an authorized application.
 */
class ListAuthorizedAppsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListAuthorizedAppsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListAuthorizedAppsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListAuthorizedAppsResponseAppsItem> $apps An array of objects, each representing an authorized application.
     */
    #[JsonProperty('apps'), ArrayType([ListAuthorizedAppsResponseAppsItem::class])]
    public ?array $apps;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListAuthorizedAppsResponseLinksItem>,
     *   apps?: ?array<ListAuthorizedAppsResponseAppsItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->apps = $values['apps'] ?? null;
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
