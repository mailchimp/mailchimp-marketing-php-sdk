<?php

namespace Mailchimp\Reporting\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * The details of a survey question's answer.
 */
class ListSurveyQuestionAnswersReportingResponseAnswersItem extends JsonSerializableType
{
    /**
     * @var ?ListSurveyQuestionAnswersReportingResponseAnswersItemContact $contact Information about the contact.
     */
    #[JsonProperty('contact')]
    public ?ListSurveyQuestionAnswersReportingResponseAnswersItemContact $contact;

    /**
     * @var ?string $id The ID of the answer.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isNewContact If this contact was added to the Mailchimp audience via this survey.
     */
    #[JsonProperty('is_new_contact')]
    public ?bool $isNewContact;

    /**
     * @var ?string $responseId The ID of the survey response.
     */
    #[JsonProperty('response_id')]
    public ?string $responseId;

    /**
     * @var ?DateTime $submittedAt The date and time when the survey response was submitted in ISO 8601 format.
     */
    #[JsonProperty('submitted_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $submittedAt;

    /**
     * @var ?string $value The raw text answer.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @param array{
     *   contact?: ?ListSurveyQuestionAnswersReportingResponseAnswersItemContact,
     *   id?: ?string,
     *   isNewContact?: ?bool,
     *   responseId?: ?string,
     *   submittedAt?: ?DateTime,
     *   value?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contact = $values['contact'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isNewContact = $values['isNewContact'] ?? null;
        $this->responseId = $values['responseId'] ?? null;
        $this->submittedAt = $values['submittedAt'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
