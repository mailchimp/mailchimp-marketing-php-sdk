<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\ListsPost;

/**
 * Batch update list members.
 */
class BatchSubscribeOrUnsubscribeListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<BatchSubscribeOrUnsubscribeListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([BatchSubscribeOrUnsubscribeListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?int $errorCount The total number of items matching the query, irrespective of pagination.
     */
    #[JsonProperty('error_count')]
    public ?int $errorCount;

    /**
     * @var ?array<BatchSubscribeOrUnsubscribeListsResponseErrorsItem> $errors An array of objects, each representing an email address that could not be added to the list or updated and an error message providing more details.
     */
    #[JsonProperty('errors'), ArrayType([BatchSubscribeOrUnsubscribeListsResponseErrorsItem::class])]
    public ?array $errors;

    /**
     * @var ?array<ListsPost> $newMembers An array of objects, each representing a new member that was added to the list.
     */
    #[JsonProperty('new_members'), ArrayType([ListsPost::class])]
    public ?array $newMembers;

    /**
     * @var ?int $totalCreated The total number of items matching the query, irrespective of pagination.
     */
    #[JsonProperty('total_created')]
    public ?int $totalCreated;

    /**
     * @var ?int $totalUpdated The total number of items matching the query, irrespective of pagination.
     */
    #[JsonProperty('total_updated')]
    public ?int $totalUpdated;

    /**
     * @var ?array<ListsPost> $updatedMembers An array of objects, each representing an existing list member whose subscription status was updated.
     */
    #[JsonProperty('updated_members'), ArrayType([ListsPost::class])]
    public ?array $updatedMembers;

    /**
     * @param array{
     *   links?: ?array<BatchSubscribeOrUnsubscribeListsResponseLinksItem>,
     *   errorCount?: ?int,
     *   errors?: ?array<BatchSubscribeOrUnsubscribeListsResponseErrorsItem>,
     *   newMembers?: ?array<ListsPost>,
     *   totalCreated?: ?int,
     *   totalUpdated?: ?int,
     *   updatedMembers?: ?array<ListsPost>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->errorCount = $values['errorCount'] ?? null;
        $this->errors = $values['errors'] ?? null;
        $this->newMembers = $values['newMembers'] ?? null;
        $this->totalCreated = $values['totalCreated'] ?? null;
        $this->totalUpdated = $values['totalUpdated'] ?? null;
        $this->updatedMembers = $values['updatedMembers'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
