<?php

namespace Mailchimp\FacebookAds\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\FacebookAds\Types\ListFacebookAdsRequestSortField;
use Mailchimp\FacebookAds\Types\ListFacebookAdsRequestSortDir;

class ListFacebookAdsRequest extends JsonSerializableType
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
     * @var ?value-of<ListFacebookAdsRequestSortField> $sortField Returns files sorted by the specified field.
     */
    public ?string $sortField;

    /**
     * @var ?value-of<ListFacebookAdsRequestSortDir> $sortDir Determines the order direction for sorted results.
     */
    public ?string $sortDir;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   count?: ?int,
     *   offset?: ?int,
     *   sortField?: ?value-of<ListFacebookAdsRequestSortField>,
     *   sortDir?: ?value-of<ListFacebookAdsRequestSortDir>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->count = $values['count'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->sortField = $values['sortField'] ?? null;
        $this->sortDir = $values['sortDir'] ?? null;
    }
}
