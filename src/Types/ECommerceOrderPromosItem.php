<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class ECommerceOrderPromosItem extends JsonSerializableType
{
    /**
     * @var ?float $amountDiscounted The amount of discount applied on the total price. For example if the total cost was $100 and the customer paid $95.5, amount_discounted will be 4.5 For free shipping set amount_discounted to 0
     */
    #[JsonProperty('amount_discounted')]
    public ?float $amountDiscounted;

    /**
     * @var ?string $code The Promo Code
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @var ?value-of<ECommerceOrderPromosItemType> $type Type of discount. For free shipping set type to fixed
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   amountDiscounted?: ?float,
     *   code?: ?string,
     *   type?: ?value-of<ECommerceOrderPromosItemType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->amountDiscounted = $values['amountDiscounted'] ?? null;
        $this->code = $values['code'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
