<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ListsAbuseReports;

/**
 * A collection of abuse complaints for a specific list. An abuse complaint occurs when your recipient clicks to 'report spam' in their email program.
 */
class ListAbuseReportsListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListAbuseReportsListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListAbuseReportsListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListsAbuseReports> $abuseReports An array of objects, each representing an abuse report resource.
     */
    #[JsonProperty('abuse_reports'), ArrayType([ListsAbuseReports::class])]
    public ?array $abuseReports;

    /**
     * @var ?string $listId The list id for the abuse report.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListAbuseReportsListsResponseLinksItem>,
     *   abuseReports?: ?array<ListsAbuseReports>,
     *   listId?: ?string,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->abuseReports = $values['abuseReports'] ?? null;
        $this->listId = $values['listId'] ?? null;
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
