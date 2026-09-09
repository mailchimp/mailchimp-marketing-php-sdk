<?php

namespace Mailchimp\Automations\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * List settings for the Automation.
 */
class CreateAutomationsRequestRecipients extends JsonSerializableType
{
    /**
     * @var ?string $listId The id of the List.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?string $storeId The id of the store.
     */
    #[JsonProperty('store_id')]
    public ?string $storeId;

    /**
     * @param array{
     *   listId?: ?string,
     *   storeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->listId = $values['listId'] ?? null;
        $this->storeId = $values['storeId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
