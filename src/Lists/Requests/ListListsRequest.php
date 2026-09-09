<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Lists\Types\ListListsRequestSortField;
use Mailchimp\Lists\Types\ListListsRequestSortDir;

class ListListsRequest extends JsonSerializableType
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
     * @var ?string $beforeDateCreated Restrict response to lists created before the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $beforeDateCreated;

    /**
     * @var ?string $sinceDateCreated Restrict results to lists created after the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $sinceDateCreated;

    /**
     * @var ?string $beforeCampaignLastSent Restrict results to lists created before the last campaign send date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $beforeCampaignLastSent;

    /**
     * @var ?string $sinceCampaignLastSent Restrict results to lists created after the last campaign send date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $sinceCampaignLastSent;

    /**
     * @var ?string $email Restrict results to lists that include a specific subscriber's email address.
     */
    public ?string $email;

    /**
     * @var ?value-of<ListListsRequestSortField> $sortField Returns files sorted by the specified field.
     */
    public ?string $sortField;

    /**
     * @var ?value-of<ListListsRequestSortDir> $sortDir Determines the order direction for sorted results.
     */
    public ?string $sortDir;

    /**
     * @var ?bool $hasEcommerceStore Restrict results to lists that contain an active, connected, undeleted ecommerce store.
     */
    public ?bool $hasEcommerceStore;

    /**
     * @var ?bool $includeTotalContacts Deprecated. Return the total_contacts field in the stats response, which contains an approximate count of subscribed, unsubscribed, and transactional contacts. For a complete audience contact count, use the /audiences endpoint instead.
     */
    public ?bool $includeTotalContacts;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   count?: ?int,
     *   offset?: ?int,
     *   beforeDateCreated?: ?string,
     *   sinceDateCreated?: ?string,
     *   beforeCampaignLastSent?: ?string,
     *   sinceCampaignLastSent?: ?string,
     *   email?: ?string,
     *   sortField?: ?value-of<ListListsRequestSortField>,
     *   sortDir?: ?value-of<ListListsRequestSortDir>,
     *   hasEcommerceStore?: ?bool,
     *   includeTotalContacts?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->count = $values['count'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->beforeDateCreated = $values['beforeDateCreated'] ?? null;
        $this->sinceDateCreated = $values['sinceDateCreated'] ?? null;
        $this->beforeCampaignLastSent = $values['beforeCampaignLastSent'] ?? null;
        $this->sinceCampaignLastSent = $values['sinceCampaignLastSent'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->sortField = $values['sortField'] ?? null;
        $this->sortDir = $values['sortDir'] ?? null;
        $this->hasEcommerceStore = $values['hasEcommerceStore'] ?? null;
        $this->includeTotalContacts = $values['includeTotalContacts'] ?? null;
    }
}
