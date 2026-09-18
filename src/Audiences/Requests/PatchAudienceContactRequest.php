<?php

namespace Mailchimp\Audiences\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Audiences\Types\PatchAudienceContactRequestMergeFieldValidationMode;
use Mailchimp\Audiences\Types\PatchAudienceContactRequestDataMode;
use Mailchimp\Audiences\Types\PatchAudienceContactRequestEmailChannel;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Audiences\Types\PatchAudienceContactRequestMergeFieldsValueAddr1;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Core\Types\Union;
use Mailchimp\Audiences\Types\PatchAudienceContactRequestSmsChannel;
use Mailchimp\Audiences\Types\PatchAudienceContactRequestTagsItemName;

class PatchAudienceContactRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<PatchAudienceContactRequestMergeFieldValidationMode> $mergeFieldValidationMode Defines how merge field validation is handled. When set to `ignore_required_checks`, the API does not raise an error if required merge fields are missing from the request. When set to `strict`, the API enforces validation and returns an error if any required merge field is not provided. If this setting is omitted, `strict` is applied by default.
     */
    public ?string $mergeFieldValidationMode;

    /**
     * @var ?value-of<PatchAudienceContactRequestDataMode> $dataMode Indicates the data processing mode. In `historical` mode, contact data changes do not trigger automations or webhooks. In `live mode`, such changes do trigger them.
     */
    public ?string $dataMode;

    /**
     * @var ?PatchAudienceContactRequestEmailChannel $emailChannel
     */
    #[JsonProperty('email_channel')]
    public ?PatchAudienceContactRequestEmailChannel $emailChannel;

    /**
     * @var ?string $language The contact's detected language.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?array<string, (
     *    PatchAudienceContactRequestMergeFieldsValueAddr1
     *   |string
     *   |float
     * )> $mergeFields A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string' => new Union(PatchAudienceContactRequestMergeFieldsValueAddr1::class, 'string', 'float')])]
    public ?array $mergeFields;

    /**
     * @var ?PatchAudienceContactRequestSmsChannel $smsChannel
     */
    #[JsonProperty('sms_channel')]
    public ?PatchAudienceContactRequestSmsChannel $smsChannel;

    /**
     * @var ?array<(
     *    string
     *   |PatchAudienceContactRequestTagsItemName
     * )> $tags An array of tags to add to the contact. Accepts tag name strings or objects with name and status. This operation is append-only; existing tags will be preserved, and only new tags from this array will be added.
     */
    #[JsonProperty('tags'), ArrayType([new Union('string', PatchAudienceContactRequestTagsItemName::class)])]
    public ?array $tags;

    /**
     * @param array{
     *   mergeFieldValidationMode?: ?value-of<PatchAudienceContactRequestMergeFieldValidationMode>,
     *   dataMode?: ?value-of<PatchAudienceContactRequestDataMode>,
     *   emailChannel?: ?PatchAudienceContactRequestEmailChannel,
     *   language?: ?string,
     *   mergeFields?: ?array<string, (
     *    PatchAudienceContactRequestMergeFieldsValueAddr1
     *   |string
     *   |float
     * )>,
     *   smsChannel?: ?PatchAudienceContactRequestSmsChannel,
     *   tags?: ?array<(
     *    string
     *   |PatchAudienceContactRequestTagsItemName
     * )>,
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
    }
}
