<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A survey question. On PATCH, include the question id to update it. Omitting question id creates a new question; it does not delete an existing one. To delete a question, omit its section from the sections array.
 */
class SurveySectionRequestQuestion extends JsonSerializableType
{
    /**
     * @var ?string $id The question ID. On PATCH, include to update an existing question; omit to add a new question.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var string $query The question text.
     */
    #[JsonProperty('query')]
    public string $query;

    /**
     * @var value-of<SurveySectionRequestQuestionType> $type The response type of the survey question.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?bool $isRequired Whether this question is required.
     */
    #[JsonProperty('is_required')]
    public ?bool $isRequired;

    /**
     * @var ?bool $hasOther Whether this question has an 'other' option.
     */
    #[JsonProperty('has_other')]
    public ?bool $hasOther;

    /**
     * @var ?string $otherLabel Label for the 'other' option.
     */
    #[JsonProperty('other_label')]
    public ?string $otherLabel;

    /**
     * @var ?string $rangeLowLabel Label for the low end of a range question.
     */
    #[JsonProperty('range_low_label')]
    public ?string $rangeLowLabel;

    /**
     * @var ?string $rangeHighLabel Label for the high end of a range question.
     */
    #[JsonProperty('range_high_label')]
    public ?string $rangeHighLabel;

    /**
     * @var ?int $rangeLowValue Low value for a range question.
     */
    #[JsonProperty('range_low_value')]
    public ?int $rangeLowValue;

    /**
     * @var ?int $rangeHighValue High value for a range question.
     */
    #[JsonProperty('range_high_value')]
    public ?int $rangeHighValue;

    /**
     * @var ?string $rangePresentation How a range question is presented.
     */
    #[JsonProperty('range_presentation')]
    public ?string $rangePresentation;

    /**
     * @var ?string $placeholderLabel Placeholder text for text or email questions.
     */
    #[JsonProperty('placeholder_label')]
    public ?string $placeholderLabel;

    /**
     * @var ?bool $subscribeCheckboxEnabled Whether the subscribe checkbox is enabled.
     */
    #[JsonProperty('subscribe_checkbox_enabled')]
    public ?bool $subscribeCheckboxEnabled;

    /**
     * @var ?string $subscribeCheckboxLabel Label for the subscribe checkbox.
     */
    #[JsonProperty('subscribe_checkbox_label')]
    public ?string $subscribeCheckboxLabel;

    /**
     * @var ?bool $shouldAutoTag Whether responses should automatically apply tags.
     */
    #[JsonProperty('should_auto_tag')]
    public ?bool $shouldAutoTag;

    /**
     * @var ?array<SurveySectionRequestQuestionOptionsItem> $options Answer options for pickOne, pickMany, or dropdown questions.
     */
    #[JsonProperty('options'), ArrayType([SurveySectionRequestQuestionOptionsItem::class])]
    public ?array $options;

    /**
     * @var ?array<string, mixed> $mergeField Merge field mapping for contact information questions.
     */
    #[JsonProperty('merge_field'), ArrayType(['string' => 'mixed'])]
    public ?array $mergeField;

    /**
     * @param array{
     *   query: string,
     *   type: value-of<SurveySectionRequestQuestionType>,
     *   id?: ?string,
     *   isRequired?: ?bool,
     *   hasOther?: ?bool,
     *   otherLabel?: ?string,
     *   rangeLowLabel?: ?string,
     *   rangeHighLabel?: ?string,
     *   rangeLowValue?: ?int,
     *   rangeHighValue?: ?int,
     *   rangePresentation?: ?string,
     *   placeholderLabel?: ?string,
     *   subscribeCheckboxEnabled?: ?bool,
     *   subscribeCheckboxLabel?: ?string,
     *   shouldAutoTag?: ?bool,
     *   options?: ?array<SurveySectionRequestQuestionOptionsItem>,
     *   mergeField?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->query = $values['query'];
        $this->type = $values['type'];
        $this->isRequired = $values['isRequired'] ?? null;
        $this->hasOther = $values['hasOther'] ?? null;
        $this->otherLabel = $values['otherLabel'] ?? null;
        $this->rangeLowLabel = $values['rangeLowLabel'] ?? null;
        $this->rangeHighLabel = $values['rangeHighLabel'] ?? null;
        $this->rangeLowValue = $values['rangeLowValue'] ?? null;
        $this->rangeHighValue = $values['rangeHighValue'] ?? null;
        $this->rangePresentation = $values['rangePresentation'] ?? null;
        $this->placeholderLabel = $values['placeholderLabel'] ?? null;
        $this->subscribeCheckboxEnabled = $values['subscribeCheckboxEnabled'] ?? null;
        $this->subscribeCheckboxLabel = $values['subscribeCheckboxLabel'] ?? null;
        $this->shouldAutoTag = $values['shouldAutoTag'] ?? null;
        $this->options = $values['options'] ?? null;
        $this->mergeField = $values['mergeField'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
