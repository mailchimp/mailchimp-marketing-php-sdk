<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Details for the automations attached to this store.
 */
class ECommerceStoreAutomations extends JsonSerializableType
{
    /**
     * @var ?ECommerceStoreAutomationsAbandonedBrowse $abandonedBrowse abandonedBrowse automation details. abandonedBrowse is also known as Product Retargeting Email or Retarget Site Visitors on the web.
     */
    #[JsonProperty('abandoned_browse')]
    public ?ECommerceStoreAutomationsAbandonedBrowse $abandonedBrowse;

    /**
     * @var ?ECommerceStoreAutomationsAbandonedCart $abandonedCart abandonedCart automation details.
     */
    #[JsonProperty('abandoned_cart')]
    public ?ECommerceStoreAutomationsAbandonedCart $abandonedCart;

    /**
     * @param array{
     *   abandonedBrowse?: ?ECommerceStoreAutomationsAbandonedBrowse,
     *   abandonedCart?: ?ECommerceStoreAutomationsAbandonedCart,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->abandonedBrowse = $values['abandonedBrowse'] ?? null;
        $this->abandonedCart = $values['abandonedCart'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
