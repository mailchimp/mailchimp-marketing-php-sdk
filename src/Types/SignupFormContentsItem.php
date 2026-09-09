<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Collection of Content for List Signup Forms.
 */
class SignupFormContentsItem extends JsonSerializableType
{
    /**
     * @var ?value-of<SignupFormContentsItemSection> $section The content section name.
     */
    #[JsonProperty('section')]
    public ?string $section;

    /**
     * @var ?string $value The content section text.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   section?: ?value-of<SignupFormContentsItemSection>,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->section = $values['section'] ?? null;
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
