<?php

namespace Mailchimp\FileManager\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateFileFileManagerRequest extends JsonSerializableType
{
    /**
     * @var string $fileData The base64-encoded contents of the file.
     */
    #[JsonProperty('file_data')]
    public string $fileData;

    /**
     * @var ?int $folderId The id of the folder.
     */
    #[JsonProperty('folder_id')]
    public ?int $folderId;

    /**
     * @var string $name The name of the file.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   fileData: string,
     *   name: string,
     *   folderId?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->fileData = $values['fileData'];
        $this->folderId = $values['folderId'] ?? null;
        $this->name = $values['name'];
    }
}
