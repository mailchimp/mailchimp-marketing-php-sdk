<?php

namespace Mailchimp\Batches\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Batches\Types\CreateBatchesRequestOperationsItem;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

class CreateBatchesRequest extends JsonSerializableType
{
    /**
     * @var array<CreateBatchesRequestOperationsItem> $operations An array of objects that describes operations to perform.
     */
    #[JsonProperty('operations'), ArrayType([CreateBatchesRequestOperationsItem::class])]
    public array $operations;

    /**
     * @param array{
     *   operations: array<CreateBatchesRequestOperationsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->operations = $values['operations'];
    }
}
