<?php

namespace Mailchimp\Reporting\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\SurveyQuestionReport;

class ListSurveyQuestionsReportingResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListSurveyQuestionsReportingResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListSurveyQuestionsReportingResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<SurveyQuestionReport> $questions An array of reports for each question on the survey.
     */
    #[JsonProperty('questions'), ArrayType([SurveyQuestionReport::class])]
    public ?array $questions;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListSurveyQuestionsReportingResponseLinksItem>,
     *   questions?: ?array<SurveyQuestionReport>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->questions = $values['questions'] ?? null;
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
