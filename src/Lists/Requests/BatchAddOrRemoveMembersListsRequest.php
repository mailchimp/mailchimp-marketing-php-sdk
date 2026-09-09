<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

class BatchAddOrRemoveMembersListsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $membersToAdd An array of emails to be used for a static segment. Any emails provided that are not present on the list will be ignored. A maximum of 500 members can be sent.
     */
    #[JsonProperty('members_to_add'), ArrayType(['string'])]
    public ?array $membersToAdd;

    /**
     * @var ?array<string> $membersToRemove An array of emails to be used for a static segment. Any emails provided that are not present on the list will be ignored. A maximum of 500 members can be sent.
     */
    #[JsonProperty('members_to_remove'), ArrayType(['string'])]
    public ?array $membersToRemove;

    /**
     * @param array{
     *   membersToAdd?: ?array<string>,
     *   membersToRemove?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->membersToAdd = $values['membersToAdd'] ?? null;
        $this->membersToRemove = $values['membersToRemove'] ?? null;
    }
}
