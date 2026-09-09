<?php

namespace Mailchimp\Templates\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Default content for a template.
 */
class ListDefaultContentTemplatesResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListDefaultContentTemplatesResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListDefaultContentTemplatesResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<string, mixed> $sections The sections that you can edit in the template, including each section's default content.
     */
    #[JsonProperty('sections'), ArrayType(['string' => 'mixed'])]
    public ?array $sections;

    /**
     * @param array{
     *   links?: ?array<ListDefaultContentTemplatesResponseLinksItem>,
     *   sections?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->sections = $values['sections'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
