<?php

namespace Mailchimp\Batches\Types;

use Mailchimp\Core\Json\JsonSerializableType;

/**
 * Any request query parameters. Example parameters: {"count":10, "offset":0}
 */
class CreateBatchesRequestOperationsItemParams extends JsonSerializableType
{
    /**
     * @param array{
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        unset($values);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
