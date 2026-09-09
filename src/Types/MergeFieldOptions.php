<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Extra options for some merge field types.
 */
class MergeFieldOptions extends JsonSerializableType
{
    /**
     * @var ?array<string> $choices In a radio or dropdown non-group field, the available options for contacts to pick from.
     */
    #[JsonProperty('choices'), ArrayType(['string'])]
    public ?array $choices;

    /**
     * @var ?string $dateFormat In a date or birthday field, the format of the date.
     */
    #[JsonProperty('date_format')]
    public ?string $dateFormat;

    /**
     * @var ?int $defaultCountry In an address field, the default country code if none supplied.
     */
    #[JsonProperty('default_country')]
    public ?int $defaultCountry;

    /**
     * @var ?string $phoneFormat In a phone field, the phone number type: US or International.
     */
    #[JsonProperty('phone_format')]
    public ?string $phoneFormat;

    /**
     * @var ?int $size In a text field, the default length of the text field.
     */
    #[JsonProperty('size')]
    public ?int $size;

    /**
     * @param array{
     *   choices?: ?array<string>,
     *   dateFormat?: ?string,
     *   defaultCountry?: ?int,
     *   phoneFormat?: ?string,
     *   size?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->choices = $values['choices'] ?? null;
        $this->dateFormat = $values['dateFormat'] ?? null;
        $this->defaultCountry = $values['defaultCountry'] ?? null;
        $this->phoneFormat = $values['phoneFormat'] ?? null;
        $this->size = $values['size'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
