<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Core\Types\Union;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A member who unsubscribed from a specific campaign.
 */
class Unsubscribes extends JsonSerializableType
{
    /**
     * @var ?array<UnsubscribesLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([UnsubscribesLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The campaign id.
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
     * @var ?string $listId The list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?bool $listIsActive The status of the list used, namely if it's deleted or disabled.
     */
    #[JsonProperty('list_is_active')]
    public ?bool $listIsActive;

    /**
     * @var ?array<string, (
     *    UnsubscribesMergeFieldsValueAddr1
     *   |string
     *   |float
     * )> $mergeFields A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string' => new Union(UnsubscribesMergeFieldsValueAddr1::class, 'string', 'float')])]
    public ?array $mergeFields;

    /**
     * @var ?string $reason If available, the reason listed by the member for unsubscribing.
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?DateTime $timestamp The date and time the member opted-out in ISO 8601 format.
     */
    #[JsonProperty('timestamp'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $timestamp;

    /**
     * @var ?bool $vip [VIP status](https://mailchimp.com/help/designate-and-send-to-vip-contacts/) for subscriber.
     */
    #[JsonProperty('vip')]
    public ?bool $vip;

    /**
     * @param array{
     *   links?: ?array<UnsubscribesLinksItem>,
     *   campaignId?: ?string,
     *   emailAddress?: ?string,
     *   emailId?: ?string,
     *   listId?: ?string,
     *   listIsActive?: ?bool,
     *   mergeFields?: ?array<string, (
     *    UnsubscribesMergeFieldsValueAddr1
     *   |string
     *   |float
     * )>,
     *   reason?: ?string,
     *   timestamp?: ?DateTime,
     *   vip?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->listIsActive = $values['listIsActive'] ?? null;
        $this->mergeFields = $values['mergeFields'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->timestamp = $values['timestamp'] ?? null;
        $this->vip = $values['vip'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
