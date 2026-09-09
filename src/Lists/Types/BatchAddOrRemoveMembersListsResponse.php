<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ListsPost;

/**
 * Batch add/remove List members to/from static segment
 */
class BatchAddOrRemoveMembersListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<BatchAddOrRemoveMembersListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([BatchAddOrRemoveMembersListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?int $errorCount The total number of items matching the query, irrespective of pagination.
     */
    #[JsonProperty('error_count')]
    public ?int $errorCount;

    /**
     * @var ?array<BatchAddOrRemoveMembersListsResponseErrorsItem> $errors An array of objects, each representing an array of email addresses that could not be added to the segment or removed and an error message providing more details.
     */
    #[JsonProperty('errors'), ArrayType([BatchAddOrRemoveMembersListsResponseErrorsItem::class])]
    public ?array $errors;

    /**
     * @var ?array<ListsPost> $membersAdded An array of objects, each representing a new member that was added to the static segment.
     */
    #[JsonProperty('members_added'), ArrayType([ListsPost::class])]
    public ?array $membersAdded;

    /**
     * @var ?array<ListsPost> $membersRemoved An array of objects, each representing an existing list member that got deleted from the static segment.
     */
    #[JsonProperty('members_removed'), ArrayType([ListsPost::class])]
    public ?array $membersRemoved;

    /**
     * @var ?int $totalAdded The total number of items matching the query, irrespective of pagination.
     */
    #[JsonProperty('total_added')]
    public ?int $totalAdded;

    /**
     * @var ?int $totalRemoved The total number of items matching the query, irrespective of pagination.
     */
    #[JsonProperty('total_removed')]
    public ?int $totalRemoved;

    /**
     * @param array{
     *   links?: ?array<BatchAddOrRemoveMembersListsResponseLinksItem>,
     *   errorCount?: ?int,
     *   errors?: ?array<BatchAddOrRemoveMembersListsResponseErrorsItem>,
     *   membersAdded?: ?array<ListsPost>,
     *   membersRemoved?: ?array<ListsPost>,
     *   totalAdded?: ?int,
     *   totalRemoved?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->errorCount = $values['errorCount'] ?? null;
        $this->errors = $values['errors'] ?? null;
        $this->membersAdded = $values['membersAdded'] ?? null;
        $this->membersRemoved = $values['membersRemoved'] ?? null;
        $this->totalAdded = $values['totalAdded'] ?? null;
        $this->totalRemoved = $values['totalRemoved'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
