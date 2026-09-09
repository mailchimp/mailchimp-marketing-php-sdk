<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Deprecated
 */
class AutomationWorkflowTrackingSalesforce extends JsonSerializableType
{
    /**
     * @var ?bool $campaign Create a campaign in a connected Salesforce account.
     */
    #[JsonProperty('campaign')]
    public ?bool $campaign;

    /**
     * @var ?bool $notes Update contact notes for a campaign based on a subscriber's email address.
     */
    #[JsonProperty('notes')]
    public ?bool $notes;

    /**
     * @param array{
     *   campaign?: ?bool,
     *   notes?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaign = $values['campaign'] ?? null;
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
