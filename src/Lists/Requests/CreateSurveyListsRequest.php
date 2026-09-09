<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Types\SurveySectionRequest;
use Mailchimp\Core\Types\ArrayType;

class CreateSurveyListsRequest extends JsonSerializableType
{
    /**
     * @var ?string $title The title of the survey.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?array<SurveySectionRequest> $sections Initial survey sections.
     */
    #[JsonProperty('sections'), ArrayType([SurveySectionRequest::class])]
    public ?array $sections;

    /**
     * @param array{
     *   title?: ?string,
     *   sections?: ?array<SurveySectionRequest>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->title = $values['title'] ?? null;
        $this->sections = $values['sections'] ?? null;
    }
}
