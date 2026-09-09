<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * The details of a survey question's report.
 */
class SurveyQuestionReport extends JsonSerializableType
{
    /**
     * @var ?float $averageRating The average rating for this range question.
     */
    #[JsonProperty('average_rating')]
    public ?float $averageRating;

    /**
     * @var ?SurveyQuestionReportContactCounts $contactCounts For email question types, how many are new, known, or unknown contacts.
     */
    #[JsonProperty('contact_counts')]
    public ?SurveyQuestionReportContactCounts $contactCounts;

    /**
     * @var ?bool $hasOther Whether this survey question has an 'other' option.
     */
    #[JsonProperty('has_other')]
    public ?bool $hasOther;

    /**
     * @var ?string $id The ID of the survey question.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isRequired Whether this survey question is required to answer.
     */
    #[JsonProperty('is_required')]
    public ?bool $isRequired;

    /**
     * @var ?SurveyQuestionReportMergeField $mergeField A [merge field](https://mailchimp.com/developer/marketing/docs/merge-fields/) for an audience.
     */
    #[JsonProperty('merge_field')]
    public ?SurveyQuestionReportMergeField $mergeField;

    /**
     * @var ?array<SurveyQuestionReportOptionsItem> $options The answer choices for this question.
     */
    #[JsonProperty('options'), ArrayType([SurveyQuestionReportOptionsItem::class])]
    public ?array $options;

    /**
     * @var ?string $otherLabel Label used for the 'other' option of this survey question.
     */
    #[JsonProperty('other_label')]
    public ?string $otherLabel;

    /**
     * @var ?string $placeholderLabel Placeholder text for this survey question's answer box.
     */
    #[JsonProperty('placeholder_label')]
    public ?string $placeholderLabel;

    /**
     * @var ?string $query The query of the survey question.
     */
    #[JsonProperty('query')]
    public ?string $query;

    /**
     * @var ?string $rangeHighLabel Label for the high end of the range.
     */
    #[JsonProperty('range_high_label')]
    public ?string $rangeHighLabel;

    /**
     * @var ?string $rangeLowLabel Label for the low end of the range.
     */
    #[JsonProperty('range_low_label')]
    public ?string $rangeLowLabel;

    /**
     * @var ?bool $subscribeCheckboxEnabled Whether the subscribe checkbox is shown for this email question.
     */
    #[JsonProperty('subscribe_checkbox_enabled')]
    public ?bool $subscribeCheckboxEnabled;

    /**
     * @var ?string $subscribeCheckboxLabel Label used for the subscribe checkbox for this email question.
     */
    #[JsonProperty('subscribe_checkbox_label')]
    public ?string $subscribeCheckboxLabel;

    /**
     * @var ?string $surveyId The unique ID of the survey.
     */
    #[JsonProperty('survey_id')]
    public ?string $surveyId;

    /**
     * @var ?int $totalResponses The total number of responses to this question.
     */
    #[JsonProperty('total_responses')]
    public ?int $totalResponses;

    /**
     * @var ?value-of<SurveyQuestionReportType> $type The response type of the survey question.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   averageRating?: ?float,
     *   contactCounts?: ?SurveyQuestionReportContactCounts,
     *   hasOther?: ?bool,
     *   id?: ?string,
     *   isRequired?: ?bool,
     *   mergeField?: ?SurveyQuestionReportMergeField,
     *   options?: ?array<SurveyQuestionReportOptionsItem>,
     *   otherLabel?: ?string,
     *   placeholderLabel?: ?string,
     *   query?: ?string,
     *   rangeHighLabel?: ?string,
     *   rangeLowLabel?: ?string,
     *   subscribeCheckboxEnabled?: ?bool,
     *   subscribeCheckboxLabel?: ?string,
     *   surveyId?: ?string,
     *   totalResponses?: ?int,
     *   type?: ?value-of<SurveyQuestionReportType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->averageRating = $values['averageRating'] ?? null;
        $this->contactCounts = $values['contactCounts'] ?? null;
        $this->hasOther = $values['hasOther'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isRequired = $values['isRequired'] ?? null;
        $this->mergeField = $values['mergeField'] ?? null;
        $this->options = $values['options'] ?? null;
        $this->otherLabel = $values['otherLabel'] ?? null;
        $this->placeholderLabel = $values['placeholderLabel'] ?? null;
        $this->query = $values['query'] ?? null;
        $this->rangeHighLabel = $values['rangeHighLabel'] ?? null;
        $this->rangeLowLabel = $values['rangeLowLabel'] ?? null;
        $this->subscribeCheckboxEnabled = $values['subscribeCheckboxEnabled'] ?? null;
        $this->subscribeCheckboxLabel = $values['subscribeCheckboxLabel'] ?? null;
        $this->surveyId = $values['surveyId'] ?? null;
        $this->totalResponses = $values['totalResponses'] ?? null;
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
