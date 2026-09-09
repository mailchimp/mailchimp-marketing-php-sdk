<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Core\Types\Union;

/**
 * A subscriber who clicked a specific URL in a specific campaign.
 */
class ClickDetailMember extends JsonSerializableType
{
    /**
     * @var ?array<ClickDetailMemberLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ClickDetailMemberLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The campaign id.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?int $clicks The total number of times the subscriber clicked on the link.
     */
    #[JsonProperty('clicks')]
    public ?int $clicks;

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
     *    ClickDetailMemberMergeFieldsValueAddr1
     *   |string
     *   |float
     * )> $mergeFields A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string' => new Union(ClickDetailMemberMergeFieldsValueAddr1::class, 'string', 'float')])]
    public ?array $mergeFields;

    /**
     * @var ?string $urlId The id for the tracked URL in the campaign.
     */
    #[JsonProperty('url_id')]
    public ?string $urlId;

    /**
     * @var ?bool $vip [VIP status](https://mailchimp.com/help/designate-and-send-to-vip-contacts/) for subscriber.
     */
    #[JsonProperty('vip')]
    public ?bool $vip;

    /**
     * @param array{
     *   links?: ?array<ClickDetailMemberLinksItem>,
     *   campaignId?: ?string,
     *   clicks?: ?int,
     *   contactStatus?: ?string,
     *   emailAddress?: ?string,
     *   emailId?: ?string,
     *   listId?: ?string,
     *   listIsActive?: ?bool,
     *   mergeFields?: ?array<string, (
     *    ClickDetailMemberMergeFieldsValueAddr1
     *   |string
     *   |float
     * )>,
     *   urlId?: ?string,
     *   vip?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->clicks = $values['clicks'] ?? null;
        $this->contactStatus = $values['contactStatus'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->listIsActive = $values['listIsActive'] ?? null;
        $this->mergeFields = $values['mergeFields'] ?? null;
        $this->urlId = $values['urlId'] ?? null;
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
