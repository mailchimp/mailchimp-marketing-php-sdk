<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * A single marketing permission a subscriber has either opted-in to or opted-out of.
 */
class ListMembersMarketingPermissionsItem extends JsonSerializableType
{
    /**
     * @var ?bool $enabled If the subscriber has opted-in to the marketing permission.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?string $marketingPermissionId The id for the marketing permission on the list
     */
    #[JsonProperty('marketing_permission_id')]
    public ?string $marketingPermissionId;

    /**
     * @var ?string $text The text of the marketing permission.
     */
    #[JsonProperty('text')]
    public ?string $text;

    /**
     * @param array{
     *   enabled?: ?bool,
     *   marketingPermissionId?: ?string,
     *   text?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enabled = $values['enabled'] ?? null;
        $this->marketingPermissionId = $values['marketingPermissionId'] ?? null;
        $this->text = $values['text'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
