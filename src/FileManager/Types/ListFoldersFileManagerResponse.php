<?php

namespace Mailchimp\FileManager\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A list of all folders in the File Manager.
 */
class ListFoldersFileManagerResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListFoldersFileManagerResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListFoldersFileManagerResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListFoldersFileManagerResponseFoldersItem> $folders A list of all folders in the File Manager.
     */
    #[JsonProperty('folders'), ArrayType([ListFoldersFileManagerResponseFoldersItem::class])]
    public ?array $folders;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListFoldersFileManagerResponseLinksItem>,
     *   folders?: ?array<ListFoldersFileManagerResponseFoldersItem>,
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
