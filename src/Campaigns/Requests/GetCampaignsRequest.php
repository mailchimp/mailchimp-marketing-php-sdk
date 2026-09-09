<?php

namespace Mailchimp\Campaigns\Requests;

use Mailchimp\Core\Json\JsonSerializableType;

class GetCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $fields A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     */
    public ?array $fields;

    /**
     * @var ?array<string> $excludeFields A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     */
    public ?array $excludeFields;

    /**
     * @var ?bool $includeResendShortcutEligibility Return the `resend_shortcut_eligibility` field in the response, which tells you if the campaign is eligible for the various Campaign Resend Shortcuts offered.
     */
    public ?bool $includeResendShortcutEligibility;

    /**
     * @var ?bool $includeResendShortcutUsage Return the `resend_shortcut_usage` field in the response.  This includes information about campaigns related by a shortcut.
     */
    public ?bool $includeResendShortcutUsage;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   includeResendShortcutEligibility?: ?bool,
     *   includeResendShortcutUsage?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->includeResendShortcutEligibility = $values['includeResendShortcutEligibility'] ?? null;
        $this->includeResendShortcutUsage = $values['includeResendShortcutUsage'] ?? null;
    }
}
