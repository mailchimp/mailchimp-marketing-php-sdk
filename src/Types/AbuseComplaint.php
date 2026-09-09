<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;
use Mailchimp\Core\Types\Union;

/**
 * Details of abuse complaints for a specific list. An abuse complaint occurs when your recipient clicks to 'report spam' in their email program.
 */
class AbuseComplaint extends JsonSerializableType
{
    /**
     * @var ?array<AbuseComplaintLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([AbuseComplaintLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The campaign id for the abuse report
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?DateTime $date Date for the abuse report
     */
    #[JsonProperty('date'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $date;

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
     * @var ?int $id The id for the abuse report
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $listId The unique id of the list for the abuse report.
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
     *    AbuseComplaintMergeFieldsValueAddr1
     *   |string
     *   |float
     * )> $mergeFields A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string' => new Union(AbuseComplaintMergeFieldsValueAddr1::class, 'string', 'float')])]
    public ?array $mergeFields;

    /**
     * @var ?bool $vip [VIP status](https://mailchimp.com/help/designate-and-send-to-vip-contacts/) for subscriber.
     */
    #[JsonProperty('vip')]
    public ?bool $vip;

    /**
     * @param array{
     *   links?: ?array<AbuseComplaintLinksItem>,
     *   campaignId?: ?string,
     *   date?: ?DateTime,
     *   emailAddress?: ?string,
     *   emailId?: ?string,
     *   id?: ?int,
     *   listId?: ?string,
     *   listIsActive?: ?bool,
     *   mergeFields?: ?array<string, (
     *    AbuseComplaintMergeFieldsValueAddr1
     *   |string
     *   |float
     * )>,
     *   vip?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->date = $values['date'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->listIsActive = $values['listIsActive'] ?? null;
        $this->mergeFields = $values['mergeFields'] ?? null;
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
