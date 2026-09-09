<?php

namespace Mailchimp\FileManager\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\GalleryFile;

/**
 * A list of available images and files stored in the File Manager for the account.
 */
class ListFilesFileManagerResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListFilesFileManagerResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListFilesFileManagerResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<GalleryFile> $files  A list of files and images in an account.
     */
    #[JsonProperty('files'), ArrayType([GalleryFile::class])]
    public ?array $files;

    /**
     * @var ?float $totalFileSize The total size of all File Manager files in bytes.
     */
    #[JsonProperty('total_file_size')]
    public ?float $totalFileSize;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListFilesFileManagerResponseLinksItem>,
     *   files?: ?array<GalleryFile>,
     *   totalFileSize?: ?float,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->files = $values['files'] ?? null;
        $this->totalFileSize = $values['totalFileSize'] ?? null;
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
