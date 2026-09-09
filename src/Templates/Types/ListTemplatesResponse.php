<?php

namespace Mailchimp\Templates\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\TemplateInstance;

/**
 * A list an account's available templates.
 */
class ListTemplatesResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListTemplatesResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListTemplatesResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<TemplateInstance> $templates All of an account's saved or custom templates.
     */
    #[JsonProperty('templates'), ArrayType([TemplateInstance::class])]
    public ?array $templates;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListTemplatesResponseLinksItem>,
     *   templates?: ?array<TemplateInstance>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->templates = $values['templates'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
