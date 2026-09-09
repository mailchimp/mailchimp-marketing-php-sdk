<?php

namespace Mailchimp\Reporting\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Information about the contact.
 */
class ListSurveyResponsesReportingResponseResponsesItemContact extends JsonSerializableType
{
    /**
     * @var ?string $avatarUrl URL for the contact's avatar or profile image.
     */
    #[JsonProperty('avatar_url')]
    public ?string $avatarUrl;

    /**
     * @var ?bool $consentsToOneToOneMessaging Indicates whether a contact consents to 1:1 messaging.
     */
    #[JsonProperty('consents_to_one_to_one_messaging')]
    public ?bool $consentsToOneToOneMessaging;

    /**
     * @var ?string $contactId The ID of this contact.
     */
    #[JsonProperty('contact_id')]
    public ?string $contactId;

    /**
     * @var ?string $email The contact's email address.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $emailId The MD5 hash of the lowercase version of the list member's email address.
     */
    #[JsonProperty('email_id')]
    public ?string $emailId;

    /**
     * @var ?string $fullName The contact's full name.
     */
    #[JsonProperty('full_name')]
    public ?string $fullName;

    /**
     * @var ?string $phone The contact's sms phone number.
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?value-of<ListSurveyResponsesReportingResponseResponsesItemContactStatus> $status The contact's current status.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   avatarUrl?: ?string,
     *   consentsToOneToOneMessaging?: ?bool,
     *   contactId?: ?string,
     *   email?: ?string,
     *   emailId?: ?string,
     *   fullName?: ?string,
     *   phone?: ?string,
     *   status?: ?value-of<ListSurveyResponsesReportingResponseResponsesItemContactStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->avatarUrl = $values['avatarUrl'] ?? null;
        $this->consentsToOneToOneMessaging = $values['consentsToOneToOneMessaging'] ?? null;
        $this->contactId = $values['contactId'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->fullName = $values['fullName'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
