<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;

class GetStorePromoRuleEcommerceRequest extends JsonSerializableType
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
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
    }
}
