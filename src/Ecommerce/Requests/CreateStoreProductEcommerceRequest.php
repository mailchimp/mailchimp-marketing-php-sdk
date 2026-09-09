<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Types\EcommerceStoresOrdersPost;

class CreateStoreProductEcommerceRequest extends JsonSerializableType
{
    /**
     * @var EcommerceStoresOrdersPost $body
     */
    public EcommerceStoresOrdersPost $body;

    /**
     * @param array{
     *   body: EcommerceStoresOrdersPost,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
