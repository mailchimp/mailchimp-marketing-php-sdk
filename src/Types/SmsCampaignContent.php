<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * The content of an SMS campaign.
 */
class SmsCampaignContent extends JsonSerializableType
{
    /**
     * @var ?string $messageBody The SMS message body.
     */
    #[JsonProperty('message_body')]
    public ?string $messageBody;

    /**
     * @var ?int $estimatedSegments The estimated number of message segments this content will use.
     */
    #[JsonProperty('estimated_segments')]
    public ?int $estimatedSegments;

    /**
     * @var ?array<string> $mergeFields The merge fields used in the message body.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string'])]
    public ?array $mergeFields;

    /**
     * @var ?array<SmsCampaignContentMediaItem> $media Attached images or files.
     */
    #[JsonProperty('media'), ArrayType([SmsCampaignContentMediaItem::class])]
    public ?array $media;

    /**
     * @var ?SmsCampaignContentSource $source The source that created or imported this content.
     */
    #[JsonProperty('source')]
    public ?SmsCampaignContentSource $source;

    /**
     * @var ?SmsCampaignContentProperties $properties Additional content properties.
     */
    #[JsonProperty('properties')]
    public ?SmsCampaignContentProperties $properties;

    /**
     * @var ?array<SmsCampaignContentLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([SmsCampaignContentLinksItem::class])]
    public ?array $links;

    /**
     * @param array{
     *   messageBody?: ?string,
     *   estimatedSegments?: ?int,
     *   mergeFields?: ?array<string>,
     *   media?: ?array<SmsCampaignContentMediaItem>,
     *   source?: ?SmsCampaignContentSource,
     *   properties?: ?SmsCampaignContentProperties,
     *   links?: ?array<SmsCampaignContentLinksItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->messageBody = $values['messageBody'] ?? null;
        $this->estimatedSegments = $values['estimatedSegments'] ?? null;
        $this->mergeFields = $values['mergeFields'] ?? null;
        $this->media = $values['media'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->links = $values['links'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
