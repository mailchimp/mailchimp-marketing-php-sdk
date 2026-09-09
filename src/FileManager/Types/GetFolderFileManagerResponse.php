<?php

namespace Mailchimp\FileManager\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * An individual folder listed in the File Manager.
 */
class GetFolderFileManagerResponse extends JsonSerializableType
{
    /**
     * @var ?array<GetFolderFileManagerResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([GetFolderFileManagerResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?DateTime $createdAt The date and time a file was added to the File Manager in ISO 8601 format.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $createdBy The username of the profile that created the folder.
     */
    #[JsonProperty('created_by')]
    public ?string $createdBy;

    /**
     * @var ?int $fileCount The number of files in the folder.
     */
    #[JsonProperty('file_count')]
    public ?int $fileCount;

    /**
     * @var ?int $id The unique id for the folder.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $name The name of the folder.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   links?: ?array<GetFolderFileManagerResponseLinksItem>,
     *   createdAt?: ?DateTime,
     *   createdBy?: ?string,
     *   fileCount?: ?int,
     *   id?: ?int,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->createdBy = $values['createdBy'] ?? null;
        $this->fileCount = $values['fileCount'] ?? null;
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
