<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Types\SurveySectionRequest;
use Mailchimp\Core\Types\ArrayType;

class UpdateSurveyListsRequest extends JsonSerializableType
{
    /**
     * @var ?string $title The title of the survey.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?bool $isPipedToInbox Whether responses are sent to Mailchimp Inbox.
     */
    #[JsonProperty('is_piped_to_inbox')]
    public ?bool $isPipedToInbox;

    /**
     * @var ?array<SurveySectionRequest> $sections The complete survey section list in display order. On update, sections omitted from this array are deleted. Include section id to update an existing section; omit section id to add a new section.
     */
    #[JsonProperty('sections'), ArrayType([SurveySectionRequest::class])]
    public ?array $sections;

    /**
     * @param array{
     *   title?: ?string,
     *   isPipedToInbox?: ?bool,
     *   sections?: ?array<SurveySectionRequest>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->title = $values['title'] ?? null;
        $this->isPipedToInbox = $values['isPipedToInbox'] ?? null;
        $this->sections = $values['sections'] ?? null;
    }
}
