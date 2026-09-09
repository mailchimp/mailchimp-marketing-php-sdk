<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Types\EcommerceStoresCartsPatch;

class UpdateStoreCustomerEcommerceRequest extends JsonSerializableType
{
    /**
     * @var EcommerceStoresCartsPatch $body
     */
    public EcommerceStoresCartsPatch $body;

    /**
     * @param array{
     *   body: EcommerceStoresCartsPatch,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
