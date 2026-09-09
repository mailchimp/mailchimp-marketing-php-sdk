<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * The outreach associated with this order. For example, an email campaign or Facebook ad.
 */
class ECommerceOrderOutreach extends JsonSerializableType
{
    /**
     * @var ?string $id A unique identifier for the outreach. Can be an email campaign ID.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name The name for the outreach.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?DateTime $publishedTime The date and time the Outreach was published in ISO 8601 format.
     */
    #[JsonProperty('published_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $publishedTime;

    /**
     * @var ?string $type The type of the outreach.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   id?: ?string,
     *   name?: ?string,
     *   publishedTime?: ?DateTime,
     *   type?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->publishedTime = $values['publishedTime'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
