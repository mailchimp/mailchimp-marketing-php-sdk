<?php

namespace Mailchimp\TemplateFolders\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A folder used to organize templates.
 */
class GetTemplateFoldersResponse extends JsonSerializableType
{
    /**
     * @var ?array<GetTemplateFoldersResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([GetTemplateFoldersResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?int $count The number of templates in the folder.
     */
    #[JsonProperty('count')]
    public ?int $count;

    /**
     * @var ?string $id A string that uniquely identifies this template folder.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name The name of the folder.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   links?: ?array<GetTemplateFoldersResponseLinksItem>,
     *   count?: ?int,
     *   id?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->count = $values['count'] ?? null;
        $this->id = $values['id'] ?? null;
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
