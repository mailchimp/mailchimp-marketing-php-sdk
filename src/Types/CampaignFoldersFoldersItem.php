<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A folder used to organize campaigns.
 */
class CampaignFoldersFoldersItem extends JsonSerializableType
{
    /**
     * @var ?array<CampaignFoldersFoldersItemLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([CampaignFoldersFoldersItemLinksItem::class])]
    public ?array $links;

    /**
     * @var ?int $count The number of campaigns in the folder.
     */
    #[JsonProperty('count')]
    public ?int $count;

    /**
     * @var ?string $id A string that uniquely identifies this campaign folder.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name The name of the folder.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   links?: ?array<CampaignFoldersFoldersItemLinksItem>,
     *   count?: ?int,
     *   id?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->count = $values['count'] ?? null;
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
