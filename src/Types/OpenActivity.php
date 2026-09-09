<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Core\Types\Union;

/**
 * A list of a member's opens activity in a specific campaign.
 */
class OpenActivity extends JsonSerializableType
{
    /**
     * @var ?array<OpenActivityLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([OpenActivityLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The unique id for the campaign.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?string $contactStatus The status of the member, namely if they are subscribed, unsubscribed, deleted, non-subscribed, transactional, pending, or need reconfirmation.
     */
    #[JsonProperty('contact_status')]
    public ?string $contactStatus;

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
     * @var ?array<string, (
     *    OpenActivityMergeFieldsValueAddr1
     *   |string
     *   |float
     * )> $mergeFields A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string' => new Union(OpenActivityMergeFieldsValueAddr1::class, 'string', 'float')])]
    public ?array $mergeFields;

    /**
     * @var ?array<OpenActivityOpensItem> $opens An array of timestamps for each time a list member opened the campaign. If a list member opens an email multiple times, this will return a separate timestamp for each open event.
     */
    #[JsonProperty('opens'), ArrayType([OpenActivityOpensItem::class])]
    public ?array $opens;

    /**
     * @var ?int $opensCount The total number of times the this campaign was opened by the list member.
     */
    #[JsonProperty('opens_count')]
    public ?int $opensCount;

    /**
     * @var ?int $proxyExcludedOpensCount The total number of times the this campaign was opened by the list member excluding opens from email clients that use proxies .
     */
    #[JsonProperty('proxy_excluded_opens_count')]
    public ?int $proxyExcludedOpensCount;

    /**
     * @var ?bool $vip [VIP status](https://mailchimp.com/help/designate-and-send-to-vip-contacts/) for subscriber.
     */
    #[JsonProperty('vip')]
    public ?bool $vip;

    /**
     * @param array{
     *   links?: ?array<OpenActivityLinksItem>,
     *   campaignId?: ?string,
     *   contactStatus?: ?string,
     *   emailAddress?: ?string,
     *   emailId?: ?string,
     *   listId?: ?string,
     *   listIsActive?: ?bool,
     *   mergeFields?: ?array<string, (
     *    OpenActivityMergeFieldsValueAddr1
     *   |string
     *   |float
     * )>,
     *   opens?: ?array<OpenActivityOpensItem>,
     *   opensCount?: ?int,
     *   proxyExcludedOpensCount?: ?int,
     *   vip?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->contactStatus = $values['contactStatus'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->listIsActive = $values['listIsActive'] ?? null;
        $this->mergeFields = $values['mergeFields'] ?? null;
        $this->opens = $values['opens'] ?? null;
        $this->opensCount = $values['opensCount'] ?? null;
        $this->proxyExcludedOpensCount = $values['proxyExcludedOpensCount'] ?? null;
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
