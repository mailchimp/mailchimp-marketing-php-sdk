<?php

namespace Mailchimp\Batches\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\Batch;

/**
 * A summary of batch requests that have been made.
 */
class ListBatchesResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListBatchesResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListBatchesResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<Batch> $batches An array of objects representing batch calls.
     */
    #[JsonProperty('batches'), ArrayType([Batch::class])]
    public ?array $batches;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListBatchesResponseLinksItem>,
     *   batches?: ?array<Batch>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->batches = $values['batches'] ?? null;
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
