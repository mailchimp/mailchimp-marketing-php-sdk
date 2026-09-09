<?php

namespace Mailchimp\Campaigns\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class ListSendChecklistCampaignsResponseItemsItem extends JsonSerializableType
{
    /**
     * @var ?string $details Details about the specific feedback item.
     */
    #[JsonProperty('details')]
    public ?string $details;

    /**
     * @var ?string $heading The heading for the specific item.
     */
    #[JsonProperty('heading')]
    public ?string $heading;

    /**
     * @var ?int $id The ID for the specific item.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?value-of<ListSendChecklistCampaignsResponseItemsItemType> $type The item type.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   details?: ?string,
     *   heading?: ?string,
     *   id?: ?int,
     *   type?: ?value-of<ListSendChecklistCampaignsResponseItemsItemType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->details = $values['details'] ?? null;
        $this->heading = $values['heading'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
