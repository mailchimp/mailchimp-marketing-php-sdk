<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class FacebookAdsContentAttachmentsItem extends JsonSerializableType
{
    /**
     * @var ?string $callToAction
     */
    #[JsonProperty('call_to_action')]
    public ?string $callToAction;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('image_url')]
    public ?string $imageUrl;

    /**
     * @var ?string $linkUrl
     */
    #[JsonProperty('link_url')]
    public ?string $linkUrl;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   callToAction?: ?string,
     *   description?: ?string,
     *   imageUrl?: ?string,
     *   linkUrl?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->callToAction = $values['callToAction'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->linkUrl = $values['linkUrl'] ?? null;
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
