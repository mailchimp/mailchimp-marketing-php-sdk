<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Information about a specific segment.
 */
class List_ extends JsonSerializableType
{
    /**
     * @var ?array<ListLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListLinksItem::class])]
    public ?array $links;

    /**
     * @var ?DateTime $createdAt The date and time the segment was created in ISO 8601 format.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?int $id The unique id for the segment.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $listId The list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?int $memberCount The number of active subscribers currently included in the segment.
     */
    #[JsonProperty('member_count')]
    public ?int $memberCount;

    /**
     * @var ?string $name The name of the segment.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?ListOptions $options The conditions of the segment. Static segments (tags) and fuzzy segments don't have conditions.
     */
    #[JsonProperty('options')]
    public ?ListOptions $options;

    /**
     * @var ?value-of<ListType> $type The type of segment. Static segments are now known as tags. Learn more about [tags](https://mailchimp.com/help/getting-started-tags?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs).
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?DateTime $updatedAt The date and time the segment was last updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   links?: ?array<ListLinksItem>,
     *   createdAt?: ?DateTime,
     *   id?: ?int,
     *   listId?: ?string,
     *   memberCount?: ?int,
     *   name?: ?string,
     *   options?: ?ListOptions,
     *   type?: ?value-of<ListType>,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->memberCount = $values['memberCount'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->options = $values['options'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
