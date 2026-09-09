<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Connected Site
 */
class FacebookAdsSite extends JsonSerializableType
{
    /**
     * @var ?int $id The ID of this connected site.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $name The name of the connected site
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $url The URL for this connected site.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   id?: ?int,
     *   name?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
