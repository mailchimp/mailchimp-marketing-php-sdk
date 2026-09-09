<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The source that created or imported this content.
 */
class SmsCampaignContentSource extends JsonSerializableType
{
    /**
     * @var ?string $type The type of source.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $id The ID of the source.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
