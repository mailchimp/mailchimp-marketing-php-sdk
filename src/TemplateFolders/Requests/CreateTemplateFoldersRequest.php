<?php

namespace Mailchimp\TemplateFolders\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateTemplateFoldersRequest extends JsonSerializableType
{
    /**
     * @var string $name The name of the folder.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   name: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
    }
}
