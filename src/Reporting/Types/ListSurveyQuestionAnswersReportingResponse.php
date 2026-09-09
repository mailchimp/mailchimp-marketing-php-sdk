<?php

namespace Mailchimp\Reporting\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

class ListSurveyQuestionAnswersReportingResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListSurveyQuestionAnswersReportingResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListSurveyQuestionAnswersReportingResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListSurveyQuestionAnswersReportingResponseAnswersItem> $answers An array of answers for a question on the survey.
     */
    #[JsonProperty('answers'), ArrayType([ListSurveyQuestionAnswersReportingResponseAnswersItem::class])]
    public ?array $answers;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListSurveyQuestionAnswersReportingResponseLinksItem>,
     *   answers?: ?array<ListSurveyQuestionAnswersReportingResponseAnswersItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->answers = $values['answers'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
