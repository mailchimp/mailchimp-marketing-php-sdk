<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * An option for Signup Form Styles.
 */
class CreateSignupFormListsRequestStylesItemOptionsItem extends JsonSerializableType
{
    /**
     * @var ?string $property A string that identifies the property.
     */
    #[JsonProperty('property')]
    public ?string $property;

    /**
     * @var ?string $value A string that identifies value of the property.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   property?: ?string,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->property = $values['property'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
