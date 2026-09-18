<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The source from which the parent's entity was created.
 */
class AudiencesContactSource extends JsonSerializableType
{
    /**
     * @var ?string $name The name of the entity's source
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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
