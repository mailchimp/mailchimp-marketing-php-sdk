<?php

namespace Mailchimp\Templates\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateTemplatesRequest extends JsonSerializableType
{
    /**
     * @var ?string $folderId The id of the folder the template is currently in.
     */
    #[JsonProperty('folder_id')]
    public ?string $folderId;

    /**
     * @var string $html The raw HTML for the template. We  support the Mailchimp [Template Language](https://mailchimp.com/help/getting-started-with-mailchimps-template-language/) in any HTML code passed via the API.
     */
    #[JsonProperty('html')]
    public string $html;

    /**
     * @var string $name The name of the template.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   html: string,
     *   name: string,
     *   folderId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->folderId = $values['folderId'] ?? null;
        $this->html = $values['html'];
        $this->name = $values['name'];
    }
}
