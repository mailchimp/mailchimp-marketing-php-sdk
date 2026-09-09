<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Collection of Element style for List Signup Forms.
 */
class CreateSignupFormListsRequestStylesItem extends JsonSerializableType
{
    /**
     * @var ?array<CreateSignupFormListsRequestStylesItemOptionsItem> $options A collection of options for a selector.
     */
    #[JsonProperty('options'), ArrayType([CreateSignupFormListsRequestStylesItemOptionsItem::class])]
    public ?array $options;

    /**
     * @var ?value-of<CreateSignupFormListsRequestStylesItemSelector> $selector A string that identifies the element selector.
     */
    #[JsonProperty('selector')]
    public ?string $selector;

    /**
     * @param array{
     *   options?: ?array<CreateSignupFormListsRequestStylesItemOptionsItem>,
     *   selector?: ?value-of<CreateSignupFormListsRequestStylesItemSelector>,
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
