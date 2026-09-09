<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

class FacebookAdsContent extends JsonSerializableType
{
    /**
     * @var ?array<FacebookAdsContentAttachmentsItem> $attachments
     */
    #[JsonProperty('attachments'), ArrayType([FacebookAdsContentAttachmentsItem::class])]
    public ?array $attachments;

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
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   attachments?: ?array<FacebookAdsContentAttachmentsItem>,
     *   callToAction?: ?string,
     *   description?: ?string,
     *   imageUrl?: ?string,
     *   linkUrl?: ?string,
     *   message?: ?string,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attachments = $values['attachments'] ?? null;
        $this->callToAction = $values['callToAction'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->linkUrl = $values['linkUrl'] ?? null;
        $this->message = $values['message'] ?? null;
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
