<?php

namespace Mailchimp\Audiences\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Types\AudiencesContact;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * An array of objects, each representing a contact record.
 */
class GetAudienceContactListResponse extends JsonSerializableType
{
    /**
     * @var ?array<AudiencesContact> $contacts An array of objects, each representing a contact record.
     */
    #[JsonProperty('contacts'), ArrayType([AudiencesContact::class])]
    public ?array $contacts;

    /**
     * @var ?string $nextCursor A cursor pointing to the last item on this page of the collection. Paginate through a collection of records by setting the `cursor` parameter on a subsequent request to this value.
     */
    #[JsonProperty('next_cursor')]
    public ?string $nextCursor;

    /**
     * @var ?array<GetAudienceContactListResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([GetAudienceContactListResponseLinksItem::class])]
    public ?array $links;

    /**
     * @param array{
     *   contacts?: ?array<AudiencesContact>,
     *   nextCursor?: ?string,
     *   links?: ?array<GetAudienceContactListResponseLinksItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contacts = $values['contacts'] ?? null;
        $this->nextCursor = $values['nextCursor'] ?? null;
        $this->links = $values['links'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
