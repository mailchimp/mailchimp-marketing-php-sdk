<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * The member activity events for a given member.
 */
class ListMemberActivityFeedListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListMemberActivityFeedListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListMemberActivityFeedListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<mixed> $activity An array of objects, each representing a contact event. There are multiple possible types, see the [activity schema documentation](https://mailchimp.com/developer/marketing/docs/alternative-schemas/#activity-schemas).
     */
    #[JsonProperty('activity'), ArrayType(['mixed'])]
    public ?array $activity;

    /**
     * @var ?string $emailId The MD5 hash of the lowercase version of the list member's email address.
     */
    #[JsonProperty('email_id')]
    public ?string $emailId;

    /**
     * @var ?string $listId The list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @param array{
     *   links?: ?array<ListMemberActivityFeedListsResponseLinksItem>,
     *   activity?: ?array<mixed>,
     *   emailId?: ?string,
     *   listId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->activity = $values['activity'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->listId = $values['listId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
