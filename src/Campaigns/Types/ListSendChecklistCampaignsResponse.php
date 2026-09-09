<?php

namespace Mailchimp\Campaigns\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * The send checklist for the campaign.
 */
class ListSendChecklistCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListSendChecklistCampaignsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListSendChecklistCampaignsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?bool $isReady Whether the campaign is ready to send.
     */
    #[JsonProperty('is_ready')]
    public ?bool $isReady;

    /**
     * @var ?array<ListSendChecklistCampaignsResponseItemsItem> $items A list of feedback items to review before sending your campaign.
     */
    #[JsonProperty('items'), ArrayType([ListSendChecklistCampaignsResponseItemsItem::class])]
    public ?array $items;

    /**
     * @param array{
     *   links?: ?array<ListSendChecklistCampaignsResponseLinksItem>,
     *   isReady?: ?bool,
     *   items?: ?array<ListSendChecklistCampaignsResponseItemsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->isReady = $values['isReady'] ?? null;
        $this->items = $values['items'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
