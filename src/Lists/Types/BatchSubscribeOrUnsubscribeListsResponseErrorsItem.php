<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class BatchSubscribeOrUnsubscribeListsResponseErrorsItem extends JsonSerializableType
{
    /**
     * @var ?string $emailAddress The email address that could not be added or updated.
     */
    #[JsonProperty('email_address')]
    public ?string $emailAddress;

    /**
     * @var ?string $error The error message indicating why the email address could not be added or updated.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?value-of<BatchSubscribeOrUnsubscribeListsResponseErrorsItemErrorCode> $errorCode A unique code that identifies this specifc error.
     */
    #[JsonProperty('error_code')]
    public ?string $errorCode;

    /**
     * @var ?string $field If the error is field-related, information about which field is at issue.
     */
    #[JsonProperty('field')]
    public ?string $field;

    /**
     * @var ?string $fieldMessage Message indicating how to resolve a field-related error.
     */
    #[JsonProperty('field_message')]
    public ?string $fieldMessage;

    /**
     * @param array{
     *   emailAddress?: ?string,
     *   error?: ?string,
     *   errorCode?: ?value-of<BatchSubscribeOrUnsubscribeListsResponseErrorsItemErrorCode>,
     *   field?: ?string,
     *   fieldMessage?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->errorCode = $values['errorCode'] ?? null;
        $this->field = $values['field'] ?? null;
        $this->fieldMessage = $values['fieldMessage'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
