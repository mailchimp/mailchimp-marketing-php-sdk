<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A list of campaign folders
 */
class CampaignFolders extends JsonSerializableType
{
    /**
     * @var ?array<CampaignFoldersLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([CampaignFoldersLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<CampaignFoldersFoldersItem> $folders An array of objects representing campaign folders.
     */
    #[JsonProperty('folders'), ArrayType([CampaignFoldersFoldersItem::class])]
    public ?array $folders;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<CampaignFoldersLinksItem>,
     *   folders?: ?array<CampaignFoldersFoldersItem>,
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
