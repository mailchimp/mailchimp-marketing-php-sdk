<?php

namespace Mailchimp\FileManager\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class UpdateFileFileManagerRequest extends JsonSerializableType
{
    /**
     * @var ?int $folderId The id of the folder. Setting `folder_id` to `0` will remove a file from its current folder.
     */
    #[JsonProperty('folder_id')]
    public ?int $folderId;

    /**
     * @var ?string $name The name of the file.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   folderId?: ?int,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->folderId = $values['folderId'] ?? null;
        $this->name = $values['name'] ?? null;
    }
}
