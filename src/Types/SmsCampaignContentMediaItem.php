<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class SmsCampaignContentMediaItem extends JsonSerializableType
{
    /**
     * @var ?string $url The URL of the media file.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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
