<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * An individual file listed in the File Manager.
 */
class GalleryFile extends JsonSerializableType
{
    /**
     * @var ?array<GalleryFileLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([GalleryFileLinksItem::class])]
    public ?array $links;

    /**
     * @var ?DateTime $createdAt The date and time a file was added to the File Manager in ISO 8601 format.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $createdBy The username of the profile that uploaded the file.
     */
    #[JsonProperty('created_by')]
    public ?string $createdBy;

    /**
     * @var ?int $folderId The id of the folder.
     */
    #[JsonProperty('folder_id')]
    public ?int $folderId;

    /**
     * @var ?string $fullSizeUrl The url of the full-size file.
     */
    #[JsonProperty('full_size_url')]
    public ?string $fullSizeUrl;

    /**
     * @var ?int $height The height of an image.
     */
    #[JsonProperty('height')]
    public ?int $height;

    /**
     * @var ?int $id The unique id of the file.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $name The name of the file.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $size The size of the file in bytes.
     */
    #[JsonProperty('size')]
    public ?int $size;

    /**
     * @var ?string $thumbnailUrl The url of the thumbnail preview.
     */
    #[JsonProperty('thumbnail_url')]
    public ?string $thumbnailUrl;

    /**
     * @var ?value-of<GalleryFileType> $type The type of file in the File Manager.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?int $width The width of the image.
     */
    #[JsonProperty('width')]
    public ?int $width;

    /**
     * @param array{
     *   links?: ?array<GalleryFileLinksItem>,
     *   createdAt?: ?DateTime,
     *   createdBy?: ?string,
     *   folderId?: ?int,
     *   fullSizeUrl?: ?string,
     *   height?: ?int,
     *   id?: ?int,
     *   name?: ?string,
     *   size?: ?int,
     *   thumbnailUrl?: ?string,
     *   type?: ?value-of<GalleryFileType>,
     *   width?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->createdBy = $values['createdBy'] ?? null;
        $this->folderId = $values['folderId'] ?? null;
        $this->fullSizeUrl = $values['fullSizeUrl'] ?? null;
        $this->height = $values['height'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->size = $values['size'] ?? null;
        $this->thumbnailUrl = $values['thumbnailUrl'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->width = $values['width'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
