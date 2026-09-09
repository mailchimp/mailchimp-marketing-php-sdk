<?php

namespace Mailchimp\TemplateFolders\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A list of template folders
 */
class ListTemplateFoldersResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListTemplateFoldersResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListTemplateFoldersResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListTemplateFoldersResponseFoldersItem> $folders An array of objects representing template folders.
     */
    #[JsonProperty('folders'), ArrayType([ListTemplateFoldersResponseFoldersItem::class])]
    public ?array $folders;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListTemplateFoldersResponseLinksItem>,
     *   folders?: ?array<ListTemplateFoldersResponseFoldersItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->folders = $values['folders'] ?? null;
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
