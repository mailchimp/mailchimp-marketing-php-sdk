<?php

namespace Mailchimp\AccountExports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * An array of objects, each representing an account export.
 */
class ListAccountExportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListAccountExportsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListAccountExportsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListAccountExportsResponseExportsItem> $exports An array of objects, each representing an account export.
     */
    #[JsonProperty('exports'), ArrayType([ListAccountExportsResponseExportsItem::class])]
    public ?array $exports;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListAccountExportsResponseLinksItem>,
     *   exports?: ?array<ListAccountExportsResponseExportsItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->exports = $values['exports'] ?? null;
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
