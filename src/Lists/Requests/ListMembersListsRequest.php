<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Lists\Types\ListMembersListsRequestStatus;
use Mailchimp\Lists\Types\ListMembersListsRequestInterestMatch;
use Mailchimp\Lists\Types\ListMembersListsRequestSortField;
use Mailchimp\Lists\Types\ListMembersListsRequestSortDir;

class ListMembersListsRequest extends JsonSerializableType
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
     * @var ?string $emailType The email type.
     */
    public ?string $emailType;

    /**
     * @var ?value-of<ListMembersListsRequestStatus> $status The subscriber's status.
     */
    public ?string $status;

    /**
     * @var ?string $sinceTimestampOpt Restrict results to subscribers who opted-in after the set timeframe. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $sinceTimestampOpt;

    /**
     * @var ?string $beforeTimestampOpt Restrict results to subscribers who opted-in before the set timeframe. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $beforeTimestampOpt;

    /**
     * @var ?string $sinceLastChanged Restrict results to subscribers whose information changed after the set timeframe. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $sinceLastChanged;

    /**
     * @var ?string $beforeLastChanged Restrict results to subscribers whose information changed before the set timeframe. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $beforeLastChanged;

    /**
     * @var ?string $uniqueEmailId A unique identifier for the email address across all Mailchimp lists.
     */
    public ?string $uniqueEmailId;

    /**
     * @var ?bool $vipOnly A filter to return only the list's VIP members. Passing `true` will restrict results to VIP list members, passing `false` will return all list members.
     */
    public ?bool $vipOnly;

    /**
     * @var ?string $interestCategoryId The unique id for the interest category.
     */
    public ?string $interestCategoryId;

    /**
     * @var ?string $interestIds Used to filter list members by interests. Must be accompanied by interest_category_id and interest_match. The value must be a comma separated list of interest ids present for any supplied interest categories.
     */
    public ?string $interestIds;

    /**
     * @var ?value-of<ListMembersListsRequestInterestMatch> $interestMatch Used to filter list members by interests. Must be accompanied by interest_category_id and interest_ids. "any" will match a member with any of the interest supplied, "all" will only match members with every interest supplied, and "none" will match members without any of the interest supplied.
     */
    public ?string $interestMatch;

    /**
     * @var ?value-of<ListMembersListsRequestSortField> $sortField Returns files sorted by the specified field.
     */
    public ?string $sortField;

    /**
     * @var ?value-of<ListMembersListsRequestSortDir> $sortDir Determines the order direction for sorted results.
     */
    public ?string $sortDir;

    /**
     * @var ?bool $sinceLastCampaign Filter subscribers by those subscribed/unsubscribed/pending/cleaned since last email campaign send. Member status is required to use this filter.
     */
    public ?bool $sinceLastCampaign;

    /**
     * @var ?string $unsubscribedSince Filter subscribers by those unsubscribed since a specific date. Using any status other than unsubscribed with this filter will result in an error.
     */
    public ?string $unsubscribedSince;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   count?: ?int,
     *   offset?: ?int,
     *   emailType?: ?string,
     *   status?: ?value-of<ListMembersListsRequestStatus>,
     *   sinceTimestampOpt?: ?string,
     *   beforeTimestampOpt?: ?string,
     *   sinceLastChanged?: ?string,
     *   beforeLastChanged?: ?string,
     *   uniqueEmailId?: ?string,
     *   vipOnly?: ?bool,
     *   interestCategoryId?: ?string,
     *   interestIds?: ?string,
     *   interestMatch?: ?value-of<ListMembersListsRequestInterestMatch>,
     *   sortField?: ?value-of<ListMembersListsRequestSortField>,
     *   sortDir?: ?value-of<ListMembersListsRequestSortDir>,
     *   sinceLastCampaign?: ?bool,
     *   unsubscribedSince?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->count = $values['count'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->sinceTimestampOpt = $values['sinceTimestampOpt'] ?? null;
        $this->beforeTimestampOpt = $values['beforeTimestampOpt'] ?? null;
        $this->sinceLastChanged = $values['sinceLastChanged'] ?? null;
        $this->beforeLastChanged = $values['beforeLastChanged'] ?? null;
        $this->uniqueEmailId = $values['uniqueEmailId'] ?? null;
        $this->vipOnly = $values['vipOnly'] ?? null;
        $this->interestCategoryId = $values['interestCategoryId'] ?? null;
        $this->interestIds = $values['interestIds'] ?? null;
        $this->interestMatch = $values['interestMatch'] ?? null;
        $this->sortField = $values['sortField'] ?? null;
        $this->sortDir = $values['sortDir'] ?? null;
        $this->sinceLastCampaign = $values['sinceLastCampaign'] ?? null;
        $this->unsubscribedSince = $values['unsubscribedSince'] ?? null;
    }
}
