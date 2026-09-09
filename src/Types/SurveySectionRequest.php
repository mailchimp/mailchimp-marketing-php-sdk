<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A survey section. On PATCH, include the section id to update it; omit the section from the sections array to delete it (and any question it contains).
 */
class SurveySectionRequest extends JsonSerializableType
{
    /**
     * @var ?string $id The section ID. On PATCH, include to update an existing section; omit to add a new section.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var value-of<SurveySectionRequestType> $type The section type.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?string $text Rich text content for introduction or context sections.
     */
    #[JsonProperty('text')]
    public ?string $text;

    /**
     * @var ?array<string, mixed> $options Additional section options.
     */
    #[JsonProperty('options'), ArrayType(['string' => 'mixed'])]
    public ?array $options;

    /**
     * @var ?SurveySectionRequestQuestion $question A survey question. On PATCH, include the question id to update it. Omitting question id creates a new question; it does not delete an existing one. To delete a question, omit its section from the sections array.
     */
    #[JsonProperty('question')]
    public ?SurveySectionRequestQuestion $question;

    /**
     * @param array{
     *   type: value-of<SurveySectionRequestType>,
     *   id?: ?string,
     *   text?: ?string,
     *   options?: ?array<string, mixed>,
     *   question?: ?SurveySectionRequestQuestion,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->type = $values['type'];
        $this->text = $values['text'] ?? null;
        $this->options = $values['options'] ?? null;
        $this->question = $values['question'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
