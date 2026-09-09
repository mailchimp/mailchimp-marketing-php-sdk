<?php

namespace Mailchimp\Reporting\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Reporting\Types\ListSurveyQuestionAnswersReportingRequestRespondentFamiliarityIs;

class ListSurveyQuestionAnswersReportingRequest extends JsonSerializableType
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
     * @var ?value-of<ListSurveyQuestionAnswersReportingRequestRespondentFamiliarityIs> $respondentFamiliarityIs Filter survey responses by familiarity of the respondents.
     */
    public ?string $respondentFamiliarityIs;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   respondentFamiliarityIs?: ?value-of<ListSurveyQuestionAnswersReportingRequestRespondentFamiliarityIs>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->respondentFamiliarityIs = $values['respondentFamiliarityIs'] ?? null;
    }
}
