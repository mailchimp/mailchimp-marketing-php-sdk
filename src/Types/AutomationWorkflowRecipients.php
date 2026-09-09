<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * List settings for the Automation.
 */
class AutomationWorkflowRecipients extends JsonSerializableType
{
    /**
     * @var ?string $listId The unique list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?bool $listIsActive The status of the list used, namely if it's deleted or disabled.
     */
    #[JsonProperty('list_is_active')]
    public ?bool $listIsActive;

    /**
     * @var ?string $listName List Name.
     */
    #[JsonProperty('list_name')]
    public ?string $listName;

    /**
     * @var ?array<SegmentTypeItem> $segmentOpts
     */
    #[JsonProperty('segment_opts'), ArrayType([SegmentTypeItem::class])]
    public ?array $segmentOpts;

    /**
     * @var ?string $storeId The id of the store.
     */
    #[JsonProperty('store_id')]
    public ?string $storeId;

    /**
     * @param array{
     *   listId?: ?string,
     *   listIsActive?: ?bool,
     *   listName?: ?string,
     *   segmentOpts?: ?array<SegmentTypeItem>,
     *   storeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->listId = $values['listId'] ?? null;
        $this->listIsActive = $values['listIsActive'] ?? null;
        $this->listName = $values['listName'] ?? null;
        $this->segmentOpts = $values['segmentOpts'] ?? null;
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
