<?php

namespace Mailchimp\Reporting\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Reporting\Types\ListSurveyResponsesReportingRequestRespondentFamiliarityIs;

class ListSurveyResponsesReportingRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $fields A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     */
    public ?array $fields;

    /**
     * @var ?array<string> $excludeFields A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     */
    public ?array $excludeFields;

    /**
     * @var ?int $answeredQuestion The ID of the question that was answered.
     */
    public ?int $answeredQuestion;

    /**
     * @var ?string $choseAnswer The ID of the option chosen to filter responses on.
     */
    public ?string $choseAnswer;

    /**
     * @var ?value-of<ListSurveyResponsesReportingRequestRespondentFamiliarityIs> $respondentFamiliarityIs Filter survey responses by familiarity of the respondents.
     */
    public ?string $respondentFamiliarityIs;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   answeredQuestion?: ?int,
     *   choseAnswer?: ?string,
     *   respondentFamiliarityIs?: ?value-of<ListSurveyResponsesReportingRequestRespondentFamiliarityIs>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->answeredQuestion = $values['answeredQuestion'] ?? null;
        $this->choseAnswer = $values['choseAnswer'] ?? null;
        $this->respondentFamiliarityIs = $values['respondentFamiliarityIs'] ?? null;
    }
}
