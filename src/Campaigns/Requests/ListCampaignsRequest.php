<?php

namespace Mailchimp\Campaigns\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Campaigns\Types\ListCampaignsRequestType;
use Mailchimp\Campaigns\Types\ListCampaignsRequestStatus;
use DateTime;
use Mailchimp\Campaigns\Types\ListCampaignsRequestSortField;
use Mailchimp\Campaigns\Types\ListCampaignsRequestSortDir;

class ListCampaignsRequest extends JsonSerializableType
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
     * @var ?int $count The number of records to return. Default value is 10. Maximum value is 1000
     */
    public ?int $count;

    /**
     * @var ?int $offset Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
     */
    public ?int $offset;

    /**
     * @var ?value-of<ListCampaignsRequestType> $type The campaign type.
     */
    public ?string $type;

    /**
     * @var ?value-of<ListCampaignsRequestStatus> $status The status of the campaign.
     */
    public ?string $status;

    /**
     * @var ?DateTime $beforeSendTime Restrict the response to campaigns sent before the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?DateTime $beforeSendTime;

    /**
     * @var ?DateTime $sinceSendTime Restrict the response to campaigns sent after the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?DateTime $sinceSendTime;

    /**
     * @var ?DateTime $beforeCreateTime Restrict the response to campaigns created before the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?DateTime $beforeCreateTime;

    /**
     * @var ?DateTime $sinceCreateTime Restrict the response to campaigns created after the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?DateTime $sinceCreateTime;

    /**
     * @var ?string $listId The unique id for the list.
     */
    public ?string $listId;

    /**
     * @var ?string $folderId The unique folder id.
     */
    public ?string $folderId;

    /**
     * @var ?string $memberId Retrieve campaigns sent to a particular list member. Member ID is The MD5 hash of the lowercase version of the list member’s email address.
     */
    public ?string $memberId;

    /**
     * @var ?value-of<ListCampaignsRequestSortField> $sortField Returns files sorted by the specified field.
     */
    public ?string $sortField;

    /**
     * @var ?value-of<ListCampaignsRequestSortDir> $sortDir Determines the order direction for sorted results.
     */
    public ?string $sortDir;

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
     *   count?: ?int,
     *   offset?: ?int,
     *   type?: ?value-of<ListCampaignsRequestType>,
     *   status?: ?value-of<ListCampaignsRequestStatus>,
     *   beforeSendTime?: ?DateTime,
     *   sinceSendTime?: ?DateTime,
     *   beforeCreateTime?: ?DateTime,
     *   sinceCreateTime?: ?DateTime,
     *   listId?: ?string,
     *   folderId?: ?string,
     *   memberId?: ?string,
     *   sortField?: ?value-of<ListCampaignsRequestSortField>,
     *   sortDir?: ?value-of<ListCampaignsRequestSortDir>,
     *   includeResendShortcutEligibility?: ?bool,
     *   includeResendShortcutUsage?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->count = $values['count'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->beforeSendTime = $values['beforeSendTime'] ?? null;
        $this->sinceSendTime = $values['sinceSendTime'] ?? null;
        $this->beforeCreateTime = $values['beforeCreateTime'] ?? null;
        $this->sinceCreateTime = $values['sinceCreateTime'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->folderId = $values['folderId'] ?? null;
        $this->memberId = $values['memberId'] ?? null;
        $this->sortField = $values['sortField'] ?? null;
        $this->sortDir = $values['sortDir'] ?? null;
        $this->includeResendShortcutEligibility = $values['includeResendShortcutEligibility'] ?? null;
        $this->includeResendShortcutUsage = $values['includeResendShortcutUsage'] ?? null;
    }
}
