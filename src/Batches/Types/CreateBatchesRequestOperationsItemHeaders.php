<?php

namespace Mailchimp\Batches\Types;

use Mailchimp\Core\Json\JsonSerializableType;

/**
 * Any HTTP headers to include with the request.
 */
class CreateBatchesRequestOperationsItemHeaders extends JsonSerializableType
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
