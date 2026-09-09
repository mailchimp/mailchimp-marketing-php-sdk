<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Deprecated
 */
class AutomationWorkflowEmailTrackingCapsule extends JsonSerializableType
{
    /**
     * @var ?bool $notes Update contact notes for a campaign based on a subscriber's email address.
     */
    #[JsonProperty('notes')]
    public ?bool $notes;

    /**
     * @param array{
     *   notes?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->notes = $values['notes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
