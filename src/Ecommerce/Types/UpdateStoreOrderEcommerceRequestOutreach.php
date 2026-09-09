<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The outreach associated with this order. For example, an email campaign or Facebook ad.
 */
class UpdateStoreOrderEcommerceRequestOutreach extends JsonSerializableType
{
    /**
     * @var ?string $id A unique identifier for the outreach. Can be an email campaign ID.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @param array{
     *   id?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
