<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CampaignContentVariateContentsItem extends JsonSerializableType
{
    /**
     * @var ?string $contentLabel Label used to identify the content option.
     */
    #[JsonProperty('content_label')]
    public ?string $contentLabel;

    /**
     * @var ?string $html The raw HTML for the campaign.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?string $plainText The plain-text portion of the campaign. If left unspecified, we'll generate this automatically.
     */
    #[JsonProperty('plain_text')]
    public ?string $plainText;

    /**
     * @param array{
     *   contentLabel?: ?string,
     *   html?: ?string,
     *   plainText?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contentLabel = $values['contentLabel'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->plainText = $values['plainText'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
