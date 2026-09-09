<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;

class ListOrdersEcommerceRequest extends JsonSerializableType
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
     * @var ?string $campaignId Restrict results to orders with a specific `campaign_id` value.
     */
    public ?string $campaignId;

    /**
     * @var ?string $outreachId Restrict results to orders with a specific `outreach_id` value.
     */
    public ?string $outreachId;

    /**
     * @var ?string $customerId Restrict results to orders made by a specific customer.
     */
    public ?string $customerId;

    /**
     * @var ?bool $hasOutreach Restrict results to orders that have an outreach attached. For example, an email campaign or Facebook ad.
     */
    public ?bool $hasOutreach;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   count?: ?int,
     *   offset?: ?int,
     *   campaignId?: ?string,
     *   outreachId?: ?string,
     *   customerId?: ?string,
     *   hasOutreach?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->count = $values['count'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->outreachId = $values['outreachId'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->hasOutreach = $values['hasOutreach'] ?? null;
    }
}
