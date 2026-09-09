<?php

namespace Mailchimp\Reporting\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A single survey response.
 */
class GetSurveyResponsReportingResponse extends JsonSerializableType
{
    /**
     * @var ?GetSurveyResponsReportingResponseContact $contact Information about the contact.
     */
    #[JsonProperty('contact')]
    public ?GetSurveyResponsReportingResponseContact $contact;

    /**
     * @var ?bool $isNewContact If this contact was added to the Mailchimp audience via this survey.
     */
    #[JsonProperty('is_new_contact')]
    public ?bool $isNewContact;

    /**
     * @var ?string $responseId The ID for the survey response.
     */
    #[JsonProperty('response_id')]
    public ?string $responseId;

    /**
     * @var ?array<GetSurveyResponsReportingResponseResultsItem> $results The survey questions and the answers to those questions.
     */
    #[JsonProperty('results'), ArrayType([GetSurveyResponsReportingResponseResultsItem::class])]
    public ?array $results;

    /**
     * @var ?DateTime $submittedAt The date and time when the survey response was submitted in ISO 8601 format.
     */
    #[JsonProperty('submitted_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $submittedAt;

    /**
     * @param array{
     *   contact?: ?GetSurveyResponsReportingResponseContact,
     *   isNewContact?: ?bool,
     *   responseId?: ?string,
     *   results?: ?array<GetSurveyResponsReportingResponseResultsItem>,
     *   submittedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contact = $values['contact'] ?? null;
        $this->isNewContact = $values['isNewContact'] ?? null;
        $this->responseId = $values['responseId'] ?? null;
        $this->results = $values['results'] ?? null;
        $this->submittedAt = $values['submittedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
