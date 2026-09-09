<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use DateTime;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Date;

class ListMemberTagsListsResponseTagsItem extends JsonSerializableType
{
    /**
     * @var ?DateTime $dateAdded The date and time the tag was added to the list member in ISO 8601 format.
     */
    #[JsonProperty('date_added'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $dateAdded;

    /**
     * @var ?int $id The unique id for the tag.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $name The name of the tag.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   dateAdded?: ?DateTime,
     *   id?: ?int,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dateAdded = $values['dateAdded'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
