<?php

namespace Mailchimp\Reporting\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

class ListSurveysReportingResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListSurveysReportingResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListSurveysReportingResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<ListSurveysReportingResponseSurveysItem> $surveys The surveys that have reports available.
     */
    #[JsonProperty('surveys'), ArrayType([ListSurveysReportingResponseSurveysItem::class])]
    public ?array $surveys;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListSurveysReportingResponseLinksItem>,
     *   surveys?: ?array<ListSurveysReportingResponseSurveysItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->surveys = $values['surveys'] ?? null;
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
