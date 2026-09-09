<?php

namespace Mailchimp\Reporting\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Survey respondent details.
 */
class ListSurveyResponsesReportingResponseResponsesItem extends JsonSerializableType
{
    /**
     * @var ?ListSurveyResponsesReportingResponseResponsesItemContact $contact Information about the contact.
     */
    #[JsonProperty('contact')]
    public ?ListSurveyResponsesReportingResponseResponsesItemContact $contact;

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
     * @var ?DateTime $submittedAt The date and time when the survey response was submitted in ISO 8601 format.
     */
    #[JsonProperty('submitted_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $submittedAt;

    /**
     * @param array{
     *   contact?: ?ListSurveyResponsesReportingResponseResponsesItemContact,
     *   isNewContact?: ?bool,
     *   responseId?: ?string,
     *   submittedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contact = $values['contact'] ?? null;
        $this->isNewContact = $values['isNewContact'] ?? null;
        $this->responseId = $values['responseId'] ?? null;
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
