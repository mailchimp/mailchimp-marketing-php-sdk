<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

class UpdateStoreOrderEcommerceRequestPromosItem extends JsonSerializableType
{
    /**
     * @var (
     *    float
     *   |string
     * ) $amountDiscounted
     */
    #[JsonProperty('amount_discounted'), Union('float', 'string')]
    public float|string $amountDiscounted;

    /**
     * @var string $code The Promo Code
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var value-of<UpdateStoreOrderEcommerceRequestPromosItemType> $type Type of discount. For free shipping set type to fixed
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   amountDiscounted: (
     *    float
     *   |string
     * ),
     *   code: string,
     *   type: value-of<UpdateStoreOrderEcommerceRequestPromosItemType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amountDiscounted = $values['amountDiscounted'];
        $this->code = $values['code'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
