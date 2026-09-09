<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Add or remove tags on a member by declaring a tag either active or inactive on a member.
 */
class CreateMemberTagListsRequestTagsItem extends JsonSerializableType
{
    /**
     * @var string $name The name of the tag.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<CreateMemberTagListsRequestTagsItemStatus> $status The status for the tag on the member, pass in active to add a tag or inactive to remove it.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @param array{
     *   name: string,
     *   status: value-of<CreateMemberTagListsRequestTagsItemStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->status = $values['status'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
