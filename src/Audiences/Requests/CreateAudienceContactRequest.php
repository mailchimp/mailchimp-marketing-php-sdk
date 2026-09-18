<?php

namespace Mailchimp\Audiences\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Audiences\Types\CreateAudienceContactRequestMergeFieldValidationMode;
use Mailchimp\Audiences\Types\CreateAudienceContactRequestDataMode;
use Mailchimp\Audiences\Types\CreateAudienceContactRequestEmailChannel;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Audiences\Types\CreateAudienceContactRequestMergeFieldsValueAddr1;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Core\Types\Union;
use Mailchimp\Audiences\Types\CreateAudienceContactRequestSmsChannel;
use Mailchimp\Audiences\Types\CreateAudienceContactRequestTagsItemName;

class CreateAudienceContactRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<CreateAudienceContactRequestMergeFieldValidationMode> $mergeFieldValidationMode Defines how merge field validation is handled. When set to `ignore_required_checks`, the API does not raise an error if required merge fields are missing from the request. When set to `strict`, the API enforces validation and returns an error if any required merge field is not provided. If this setting is omitted, `strict` is applied by default.
     */
    public ?string $mergeFieldValidationMode;

    /**
     * @var ?value-of<CreateAudienceContactRequestDataMode> $dataMode Indicates the data processing mode. In `historical` mode, contact data changes do not trigger automations or webhooks. In `live mode`, such changes do trigger them.
     */
    public ?string $dataMode;

    /**
     * @var ?CreateAudienceContactRequestEmailChannel $emailChannel
     */
    #[JsonProperty('email_channel')]
    public ?CreateAudienceContactRequestEmailChannel $emailChannel;

    /**
     * @var ?string $language The contact's detected language.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?array<string, (
     *    CreateAudienceContactRequestMergeFieldsValueAddr1
     *   |string
     *   |float
     * )> $mergeFields A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string' => new Union(CreateAudienceContactRequestMergeFieldsValueAddr1::class, 'string', 'float')])]
    public ?array $mergeFields;

    /**
     * @var ?CreateAudienceContactRequestSmsChannel $smsChannel
     */
    #[JsonProperty('sms_channel')]
    public ?CreateAudienceContactRequestSmsChannel $smsChannel;

    /**
     * @var ?array<(
     *    string
     *   |CreateAudienceContactRequestTagsItemName
     * )> $tags An array of tags to add to the contact. Accepts tag name strings or objects with name and status. This operation is append-only; existing tags will be preserved, and only new tags from this array will be added.
     */
    #[JsonProperty('tags'), ArrayType([new Union('string', CreateAudienceContactRequestTagsItemName::class)])]
    public ?array $tags;

    /**
     * @var ?bool $updateExisting If a contact already exists, update them instead of returning a conflict error. When `true` and a matching contact is found (by email or phone), the existing contact is updated with the provided channel data. Defaults to `false`.
     */
    #[JsonProperty('update_existing')]
    public ?bool $updateExisting;

    /**
     * @param array{
     *   mergeFieldValidationMode?: ?value-of<CreateAudienceContactRequestMergeFieldValidationMode>,
     *   dataMode?: ?value-of<CreateAudienceContactRequestDataMode>,
     *   emailChannel?: ?CreateAudienceContactRequestEmailChannel,
     *   language?: ?string,
     *   mergeFields?: ?array<string, (
     *    CreateAudienceContactRequestMergeFieldsValueAddr1
     *   |string
     *   |float
     * )>,
     *   smsChannel?: ?CreateAudienceContactRequestSmsChannel,
     *   tags?: ?array<(
     *    string
     *   |CreateAudienceContactRequestTagsItemName
     * )>,
     *   updateExisting?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->mergeFieldValidationMode = $values['mergeFieldValidationMode'] ?? null;
        $this->dataMode = $values['dataMode'] ?? null;
        $this->emailChannel = $values['emailChannel'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->mergeFields = $values['mergeFields'] ?? null;
        $this->smsChannel = $values['smsChannel'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->updateExisting = $values['updateExisting'] ?? null;
    }
}
