<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\MergeField;

/**
 * The [merge fields](https://mailchimp.com/developer/marketing/docs/merge-fields/) for an audience.
 */
class ListMergeFieldsListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListMergeFieldsListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListMergeFieldsListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $listId The list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?int $mergeFieldLimit The maximum number of merge fields this audience can hold. The limit is determined by the account's plan. Subtract `total_items` from this value to derive the remaining capacity.
     */
    #[JsonProperty('merge_field_limit')]
    public ?int $mergeFieldLimit;

    /**
     * @var ?array<MergeField> $mergeFields An array of objects, each representing a merge field resource.
     */
    #[JsonProperty('merge_fields'), ArrayType([MergeField::class])]
    public ?array $mergeFields;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListMergeFieldsListsResponseLinksItem>,
     *   listId?: ?string,
     *   mergeFieldLimit?: ?int,
     *   mergeFields?: ?array<MergeField>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->mergeFieldLimit = $values['mergeFieldLimit'] ?? null;
        $this->mergeFields = $values['mergeFields'] ?? null;
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
