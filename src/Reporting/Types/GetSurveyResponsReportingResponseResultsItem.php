<?php

namespace Mailchimp\Reporting\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * A single question and the response to that question.
 */
class GetSurveyResponsReportingResponseResultsItem extends JsonSerializableType
{
    /**
     * @var ?string $answer The answer to this survey question.
     */
    #[JsonProperty('answer')]
    public ?string $answer;

    /**
     * @var ?string $query The survey question.
     */
    #[JsonProperty('query')]
    public ?string $query;

    /**
     * @var ?string $questionId The unique ID for this question.
     */
    #[JsonProperty('question_id')]
    public ?string $questionId;

    /**
     * @var ?value-of<GetSurveyResponsReportingResponseResultsItemQuestionType> $questionType The type of question this is.
     */
    #[JsonProperty('question_type')]
    public ?string $questionType;

    /**
     * @param array{
     *   answer?: ?string,
     *   query?: ?string,
     *   questionId?: ?string,
     *   questionType?: ?value-of<GetSurveyResponsReportingResponseResultsItemQuestionType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->answer = $values['answer'] ?? null;
        $this->query = $values['query'] ?? null;
        $this->questionId = $values['questionId'] ?? null;
        $this->questionType = $values['questionType'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
