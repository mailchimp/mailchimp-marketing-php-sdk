<?php

namespace Mailchimp\CampaignFolders\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateCampaignFoldersRequest extends JsonSerializableType
{
    /**
     * @var string $name Name to associate with the folder.
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
