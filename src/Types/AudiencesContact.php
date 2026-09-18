<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Core\Types\Union;

/**
 * An instance of a contact.
 */
class AudiencesContact extends JsonSerializableType
{
    /**
     * @var ?string $audienceId The unique ID for the audience.
     */
    #[JsonProperty('audience_id')]
    public ?string $audienceId;

    /**
     * @var ?DateTime $createdAt The date that the contact was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?AudiencesContactEmailChannel $emailChannel
     */
    #[JsonProperty('email_channel')]
    public ?AudiencesContactEmailChannel $emailChannel;

    /**
     * @var ?string $id The unique ID for the contact.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?value-of<AudiencesContactLanguage> $language The contact's detected language. Empty string when no language has been detected or set.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?DateTime $lastUpdatedAt The date that the contact was last updated.
     */
    #[JsonProperty('last_updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastUpdatedAt;

    /**
     * @var ?array<string, (
     *    AudiencesContactMergeFieldsValueAddr1
     *   |string
     *   |float
     * )> $mergeFields A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string' => new Union(AudiencesContactMergeFieldsValueAddr1::class, 'string', 'float')])]
    public ?array $mergeFields;

    /**
     * @var ?AudiencesContactSmsChannel $smsChannel
     */
    #[JsonProperty('sms_channel')]
    public ?AudiencesContactSmsChannel $smsChannel;

    /**
     * @var ?AudiencesContactSource $source The source from which the parent's entity was created.
     */
    #[JsonProperty('source')]
    public ?AudiencesContactSource $source;

    /**
     * @var ?value-of<AudiencesContactStatus> $status The status of a contact.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<string> $tags The tags assigned to this contact.
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public ?array $tags;

    /**
     * @param array{
     *   audienceId?: ?string,
     *   createdAt?: ?DateTime,
     *   emailChannel?: ?AudiencesContactEmailChannel,
     *   id?: ?string,
     *   language?: ?value-of<AudiencesContactLanguage>,
     *   lastUpdatedAt?: ?DateTime,
     *   mergeFields?: ?array<string, (
     *    AudiencesContactMergeFieldsValueAddr1
     *   |string
     *   |float
     * )>,
     *   smsChannel?: ?AudiencesContactSmsChannel,
     *   source?: ?AudiencesContactSource,
     *   status?: ?value-of<AudiencesContactStatus>,
     *   tags?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audienceId = $values['audienceId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->emailChannel = $values['emailChannel'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->lastUpdatedAt = $values['lastUpdatedAt'] ?? null;
        $this->mergeFields = $values['mergeFields'] ?? null;
        $this->smsChannel = $values['smsChannel'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tags = $values['tags'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
