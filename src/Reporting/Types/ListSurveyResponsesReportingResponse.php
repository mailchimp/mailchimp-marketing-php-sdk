<?php

namespace Mailchimp\Reporting\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

class ListSurveyResponsesReportingResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListSurveyResponsesReportingResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListSurveyResponsesReportingResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListSurveyResponsesReportingResponseResponsesItem> $responses An array of responses to a survey.
     */
    #[JsonProperty('responses'), ArrayType([ListSurveyResponsesReportingResponseResponsesItem::class])]
    public ?array $responses;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListSurveyResponsesReportingResponseLinksItem>,
     *   responses?: ?array<ListSurveyResponsesReportingResponseResponsesItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->responses = $values['responses'] ?? null;
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
