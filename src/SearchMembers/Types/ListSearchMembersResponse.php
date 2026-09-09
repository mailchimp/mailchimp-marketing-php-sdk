<?php

namespace Mailchimp\SearchMembers\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Members found for given search term
 */
class ListSearchMembersResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListSearchMembersResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListSearchMembersResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?ListSearchMembersResponseExactMatches $exactMatches Exact matches of the provided search query.
     */
    #[JsonProperty('exact_matches')]
    public ?ListSearchMembersResponseExactMatches $exactMatches;

    /**
     * @var ?ListSearchMembersResponseFullSearch $fullSearch Partial matches of the provided search query.
     */
    #[JsonProperty('full_search')]
    public ?ListSearchMembersResponseFullSearch $fullSearch;

    /**
     * @param array{
     *   links?: ?array<ListSearchMembersResponseLinksItem>,
     *   exactMatches?: ?ListSearchMembersResponseExactMatches,
     *   fullSearch?: ?ListSearchMembersResponseFullSearch,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->exactMatches = $values['exactMatches'] ?? null;
        $this->fullSearch = $values['fullSearch'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
