<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

class BatchAddOrRemoveMembersListsResponseErrorsItem extends JsonSerializableType
{
    /**
     * @var ?array<string> $emailAddresses Email addresses added to the static segment or removed
     */
    #[JsonProperty('email_addresses'), ArrayType(['string'])]
    public ?array $emailAddresses;

    /**
     * @var ?string $error The error message indicating why the email addresses could not be added or updated.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @param array{
     *   emailAddresses?: ?array<string>,
     *   error?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailAddresses = $values['emailAddresses'] ?? null;
        $this->error = $values['error'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
