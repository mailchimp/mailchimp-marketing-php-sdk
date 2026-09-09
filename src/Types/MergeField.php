<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A [merge field](https://mailchimp.com/developer/marketing/docs/merge-fields/) for an audience.
 */
class MergeField extends JsonSerializableType
{
    /**
     * @var ?array<MergeFieldLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([MergeFieldLinksItem::class])]
    public ?array $links;

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
     * @var ?string $listId The ID that identifies this merge field's audience'.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?int $mergeFieldLimit The maximum number of merge fields this audience can hold. The limit is determined by the account's plan. Returned on POST responses only. Subtract `total_items` from this value to derive the remaining capacity.
     */
    #[JsonProperty('merge_field_limit')]
    public ?int $mergeFieldLimit;

    /**
     * @var ?int $mergeId An unchanging id for the merge field.
     */
    #[JsonProperty('merge_id')]
    public ?int $mergeId;

    /**
     * @var ?string $name The name of the merge field (audience field).
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?MergeFieldOptions $options Extra options for some merge field types.
     */
    #[JsonProperty('options')]
    public ?MergeFieldOptions $options;

    /**
     * @var ?bool $public Whether the merge field is displayed on the signup form.
     */
    #[JsonProperty('public')]
    public ?bool $public;

    /**
     * @var ?bool $required The boolean value if the merge field is required.
     */
    #[JsonProperty('required')]
    public ?bool $required;

    /**
     * @var ?string $tag The merge tag used for Mailchimp campaigns and [adding contact information](https://mailchimp.com/developer/marketing/docs/merge-fields/#add-merge-data-to-contacts).
     */
    #[JsonProperty('tag')]
    public ?string $tag;

    /**
     * @var ?int $totalItems The total number of merge fields on the audience after this field was created. Returned on POST responses only.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @var ?value-of<MergeFieldType> $type The [type](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for the merge field.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   links?: ?array<MergeFieldLinksItem>,
     *   defaultValue?: ?string,
     *   displayOrder?: ?int,
     *   helpText?: ?string,
     *   listId?: ?string,
     *   mergeFieldLimit?: ?int,
     *   mergeId?: ?int,
     *   name?: ?string,
     *   options?: ?MergeFieldOptions,
     *   public?: ?bool,
     *   required?: ?bool,
     *   tag?: ?string,
     *   totalItems?: ?int,
     *   type?: ?value-of<MergeFieldType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->defaultValue = $values['defaultValue'] ?? null;
        $this->displayOrder = $values['displayOrder'] ?? null;
        $this->helpText = $values['helpText'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->mergeFieldLimit = $values['mergeFieldLimit'] ?? null;
        $this->mergeId = $values['mergeId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->options = $values['options'] ?? null;
        $this->public = $values['public'] ?? null;
        $this->required = $values['required'] ?? null;
        $this->tag = $values['tag'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
