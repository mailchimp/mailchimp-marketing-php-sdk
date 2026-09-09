<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Lists\Types\UpdateMergeFieldListsRequestOptions;

class UpdateMergeFieldListsRequest extends JsonSerializableType
{
    /**
     * @var ?string $defaultValue The default value for the merge field if `null`.
     */
    #[JsonProperty('default_value')]
    public ?string $defaultValue;

    /**
     * @var ?int $displayOrder The order that the merge field displays on the list signup form.
     */
    #[JsonProperty('display_order')]
    public ?int $displayOrder;

    /**
     * @var ?string $helpText Extra text to help the subscriber fill out the form.
     */
    #[JsonProperty('help_text')]
    public ?string $helpText;

    /**
     * @var ?string $name The name of the merge field (audience field).
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?UpdateMergeFieldListsRequestOptions $options Extra options for some merge field types.
     */
    #[JsonProperty('options')]
    public ?UpdateMergeFieldListsRequestOptions $options;

    /**
     * @var ?bool $public Whether the merge field is displayed on the signup form.
     */
    #[JsonProperty('public')]
    public ?bool $public;

    /**
     * @var ?bool $required Whether the merge field is required to import a contact.
     */
    #[JsonProperty('required')]
    public ?bool $required;

    /**
     * @var ?string $tag The merge tag used for Mailchimp campaigns and [adding contact information](https://mailchimp.com/developer/marketing/docs/merge-fields/#add-merge-data-to-contacts).
     */
    #[JsonProperty('tag')]
    public ?string $tag;

    /**
     * @param array{
     *   defaultValue?: ?string,
     *   displayOrder?: ?int,
     *   helpText?: ?string,
     *   name?: ?string,
     *   options?: ?UpdateMergeFieldListsRequestOptions,
     *   public?: ?bool,
     *   required?: ?bool,
     *   tag?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->defaultValue = $values['defaultValue'] ?? null;
        $this->displayOrder = $values['displayOrder'] ?? null;
        $this->helpText = $values['helpText'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->options = $values['options'] ?? null;
        $this->public = $values['public'] ?? null;
        $this->required = $values['required'] ?? null;
        $this->tag = $values['tag'] ?? null;
    }
}
