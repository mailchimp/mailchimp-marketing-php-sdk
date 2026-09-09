<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by language.
 */
class SegmentTypeItemLanguage extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemLanguageField> $field Segmenting based off of a subscriber's language.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemLanguageOp> $op Whether the member's language is or is not set to a specific language.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var string $value A two-letter language identifier.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemLanguageField>,
     *   op: value-of<SegmentTypeItemLanguageOp>,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->field = $values['field'];
        $this->op = $values['op'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
