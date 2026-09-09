<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A list of a member's subscriber activity in a specific campaign, including opens, clicks, and bounces.
 */
class EmailActivity extends JsonSerializableType
{
    /**
     * @var ?array<EmailActivityLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([EmailActivityLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<EmailActivityActivityItem> $activity An array of objects, each showing an interaction with the email. Member activity limited to 1,000 open activities and 1,000 click activities per member per campaign.
     */
    #[JsonProperty('activity'), ArrayType([EmailActivityActivityItem::class])]
    public ?array $activity;

    /**
     * @var ?string $campaignId The unique id for the campaign.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?string $emailAddress Email address for a subscriber.
     */
    #[JsonProperty('email_address')]
    public ?string $emailAddress;

    /**
     * @var ?string $emailId The MD5 hash of the lowercase version of the list member's email address.
     */
    #[JsonProperty('email_id')]
    public ?string $emailId;

    /**
     * @var ?string $listId The unique id for the list.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?bool $listIsActive The status of the list used, namely if it's deleted or disabled.
     */
    #[JsonProperty('list_is_active')]
    public ?bool $listIsActive;

    /**
     * @param array{
     *   links?: ?array<EmailActivityLinksItem>,
     *   activity?: ?array<EmailActivityActivityItem>,
     *   campaignId?: ?string,
     *   emailAddress?: ?string,
     *   emailId?: ?string,
     *   listId?: ?string,
     *   listIsActive?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->activity = $values['activity'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->listIsActive = $values['listIsActive'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
