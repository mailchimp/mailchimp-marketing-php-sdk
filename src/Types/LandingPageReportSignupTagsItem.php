<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class LandingPageReportSignupTagsItem extends JsonSerializableType
{
    /**
     * @var ?int $tagId The unique id for the tag.
     */
    #[JsonProperty('tag_id')]
    public ?int $tagId;

    /**
     * @var ?string $tagName The name of the tag.
     */
    #[JsonProperty('tag_name')]
    public ?string $tagName;

    /**
     * @param array{
     *   tagId?: ?int,
     *   tagName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->tagId = $values['tagId'] ?? null;
        $this->tagName = $values['tagName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
