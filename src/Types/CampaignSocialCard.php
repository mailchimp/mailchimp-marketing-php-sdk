<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The preview for the campaign, rendered by social networks like Facebook and Twitter. [Learn more](https://mailchimp.com/help/enable-and-customize-social-cards/).
 */
class CampaignSocialCard extends JsonSerializableType
{
    /**
     * @var ?string $description A short summary of the campaign to display.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $imageUrl The url for the header image for the card.
     */
    #[JsonProperty('image_url')]
    public ?string $imageUrl;

    /**
     * @var ?string $title The title for the card. Typically the subject line of the campaign.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   description?: ?string,
     *   imageUrl?: ?string,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->description = $values['description'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->title = $values['title'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
