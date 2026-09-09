<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\SignupForm;

/**
 * List Signup Forms.
 */
class ListSignupFormsListsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListSignupFormsListsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListSignupFormsListsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $listId The list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?array<SignupForm> $signupForms List signup form.
     */
    #[JsonProperty('signup_forms'), ArrayType([SignupForm::class])]
    public ?array $signupForms;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListSignupFormsListsResponseLinksItem>,
     *   listId?: ?string,
     *   signupForms?: ?array<SignupForm>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->signupForms = $values['signupForms'] ?? null;
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
