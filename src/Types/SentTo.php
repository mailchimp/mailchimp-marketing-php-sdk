<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;
use Mailchimp\Core\Types\Union;

/**
 * A subscriber's status for a specific campaign.
 */
class SentTo extends JsonSerializableType
{
    /**
     * @var ?array<SentToLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([SentToLinksItem::class])]
    public ?array $links;

    /**
     * @var ?value-of<SentToAbsplitGroup> $absplitGroup For A/B Split Campaigns, the group the member was apart of.
     */
    #[JsonProperty('absplit_group')]
    public ?string $absplitGroup;

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
     * @var ?int $gmtOffset For campaigns sent with timewarp, the time zone group the member is apart of.
     */
    #[JsonProperty('gmt_offset')]
    public ?int $gmtOffset;

    /**
     * @var ?DateTime $lastOpen The date and time of the last open for this member in ISO 8601 format.
     */
    #[JsonProperty('last_open'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastOpen;

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
     * @var ?array<string, (
     *    SentToMergeFieldsValueAddr1
     *   |string
     *   |float
     * )> $mergeFields A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string' => new Union(SentToMergeFieldsValueAddr1::class, 'string', 'float')])]
    public ?array $mergeFields;

    /**
     * @var ?int $openCount The number of times a campaign was opened by this member.
     */
    #[JsonProperty('open_count')]
    public ?int $openCount;

    /**
     * @var ?value-of<SentToStatus> $status The status of the email delivered to this subscriber. `hard` and `soft` refer to different [bounce types](https://mailchimp.com/help/soft-vs-hard-bounces/).
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?bool $vip [VIP status](https://mailchimp.com/help/designate-and-send-to-vip-contacts/) for subscriber.
     */
    #[JsonProperty('vip')]
    public ?bool $vip;

    /**
     * @param array{
     *   links?: ?array<SentToLinksItem>,
     *   absplitGroup?: ?value-of<SentToAbsplitGroup>,
     *   campaignId?: ?string,
     *   emailAddress?: ?string,
     *   emailId?: ?string,
     *   gmtOffset?: ?int,
     *   lastOpen?: ?DateTime,
     *   listId?: ?string,
     *   listIsActive?: ?bool,
     *   mergeFields?: ?array<string, (
     *    SentToMergeFieldsValueAddr1
     *   |string
     *   |float
     * )>,
     *   openCount?: ?int,
     *   status?: ?value-of<SentToStatus>,
     *   vip?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->absplitGroup = $values['absplitGroup'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->gmtOffset = $values['gmtOffset'] ?? null;
        $this->lastOpen = $values['lastOpen'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->listIsActive = $values['listIsActive'] ?? null;
        $this->mergeFields = $values['mergeFields'] ?? null;
        $this->openCount = $values['openCount'] ?? null;
        $this->status = $values['status'] ?? null;
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
