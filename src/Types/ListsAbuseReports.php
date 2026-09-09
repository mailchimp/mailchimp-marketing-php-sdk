<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Core\Types\Union;

/**
 * Details of abuse complaints for a specific list. An abuse complaint occurs when your recipient clicks to 'report spam' in their email program.
 */
class ListsAbuseReports extends JsonSerializableType
{
    /**
     * @var ?array<ListsAbuseReportsLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListsAbuseReportsLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The campaign id for the abuse report
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?string $date Date for the abuse report
     */
    #[JsonProperty('date')]
    public ?string $date;

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
     * @var ?string $listId The list id for the abuse report.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?array<string, (
     *    ListsAbuseReportsMergeFieldsValueAddr1
     *   |string
     *   |float
     * )> $mergeFields A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string' => new Union(ListsAbuseReportsMergeFieldsValueAddr1::class, 'string', 'float')])]
    public ?array $mergeFields;

    /**
     * @var ?bool $vip [VIP status](https://mailchimp.com/help/designate-and-send-to-vip-contacts/) for subscriber.
     */
    #[JsonProperty('vip')]
    public ?bool $vip;

    /**
     * @param array{
     *   links?: ?array<ListsAbuseReportsLinksItem>,
     *   campaignId?: ?string,
     *   date?: ?string,
     *   emailAddress?: ?string,
     *   emailId?: ?string,
     *   id?: ?int,
     *   listId?: ?string,
     *   mergeFields?: ?array<string, (
     *    ListsAbuseReportsMergeFieldsValueAddr1
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
