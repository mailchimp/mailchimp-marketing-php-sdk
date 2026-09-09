<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Collection of Element style for List Signup Forms.
 */
class SignupFormStylesItem extends JsonSerializableType
{
    /**
     * @var ?array<SignupFormStylesItemOptionsItem> $options A collection of options for a selector.
     */
    #[JsonProperty('options'), ArrayType([SignupFormStylesItemOptionsItem::class])]
    public ?array $options;

    /**
     * @var ?value-of<SignupFormStylesItemSelector> $selector A string that identifies the element selector.
     */
    #[JsonProperty('selector')]
    public ?string $selector;

    /**
     * @param array{
     *   options?: ?array<SignupFormStylesItemOptionsItem>,
     *   selector?: ?value-of<SignupFormStylesItemSelector>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->options = $values['options'] ?? null;
        $this->selector = $values['selector'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
