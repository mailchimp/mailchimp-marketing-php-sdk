<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Lists\Types\CreateMemberListsRequestLocation;
use Mailchimp\Lists\Types\CreateMemberListsRequestMarketingPermissionsItem;
use Mailchimp\Lists\Types\CreateMemberListsRequestMergeFieldsValueAddr1;
use Mailchimp\Core\Types\Union;
use Mailchimp\Lists\Types\CreateMemberListsRequestStatus;
use Mailchimp\Lists\Types\CreateMemberListsRequestTimestampOptOne;
use Mailchimp\Lists\Types\CreateMemberListsRequestTimestampSignupOne;

class CreateMemberListsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $skipMergeValidation If skip_merge_validation is true, member data will be accepted without merge field values, even if the merge field is usually required. This defaults to false.
     */
    public ?bool $skipMergeValidation;

    /**
     * @var string $emailAddress Email address for a subscriber.
     */
    #[JsonProperty('email_address')]
    public string $emailAddress;

    /**
     * @var ?string $emailType Type of email this member asked to get ('html' or 'text').
     */
    #[JsonProperty('email_type')]
    public ?string $emailType;

    /**
     * @var ?array<string, bool> $interests The key of this object's properties is the ID of the interest in question.
     */
    #[JsonProperty('interests'), ArrayType(['string' => 'bool'])]
    public ?array $interests;

    /**
     * @var ?string $ipOpt The IP address the subscriber used to confirm their opt-in status.
     */
    #[JsonProperty('ip_opt')]
    public ?string $ipOpt;

    /**
     * @var ?string $ipSignup IP address the subscriber signed up from.
     */
    #[JsonProperty('ip_signup')]
    public ?string $ipSignup;

    /**
     * @var ?string $language If set/detected, the [subscriber's language](https://mailchimp.com/help/view-and-edit-contact-languages/).
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?CreateMemberListsRequestLocation $location Subscriber location information.
     */
    #[JsonProperty('location')]
    public ?CreateMemberListsRequestLocation $location;

    /**
     * @var ?array<CreateMemberListsRequestMarketingPermissionsItem> $marketingPermissions The marketing permissions for the subscriber.
     */
    #[JsonProperty('marketing_permissions'), ArrayType([CreateMemberListsRequestMarketingPermissionsItem::class])]
    public ?array $marketingPermissions;

    /**
     * @var ?array<string, (
     *    CreateMemberListsRequestMergeFieldsValueAddr1
     *   |string
     *   |float
     * )> $mergeFields A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string' => new Union(CreateMemberListsRequestMergeFieldsValueAddr1::class, 'string', 'float')])]
    public ?array $mergeFields;

    /**
     * @var value-of<CreateMemberListsRequestStatus> $status Subscriber's current status.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?array<string> $tags The tags that are associated with a member.
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public ?array $tags;

    /**
     * @var (
     *    string
     *   |value-of<CreateMemberListsRequestTimestampOptOne>
     * )|null $timestampOpt
     */
    #[JsonProperty('timestamp_opt'), Union('string', 'null')]
    public string|null $timestampOpt;

    /**
     * @var (
     *    string
     *   |value-of<CreateMemberListsRequestTimestampSignupOne>
     * )|null $timestampSignup
     */
    #[JsonProperty('timestamp_signup'), Union('string', 'null')]
    public string|null $timestampSignup;

    /**
     * @var ?bool $vip [VIP status](https://mailchimp.com/help/designate-and-send-to-vip-contacts/) for subscriber.
     */
    #[JsonProperty('vip')]
    public ?bool $vip;

    /**
     * @param array{
     *   emailAddress: string,
     *   status: value-of<CreateMemberListsRequestStatus>,
     *   skipMergeValidation?: ?bool,
     *   emailType?: ?string,
     *   interests?: ?array<string, bool>,
     *   ipOpt?: ?string,
     *   ipSignup?: ?string,
     *   language?: ?string,
     *   location?: ?CreateMemberListsRequestLocation,
     *   marketingPermissions?: ?array<CreateMemberListsRequestMarketingPermissionsItem>,
     *   mergeFields?: ?array<string, (
     *    CreateMemberListsRequestMergeFieldsValueAddr1
     *   |string
     *   |float
     * )>,
     *   tags?: ?array<string>,
     *   timestampOpt?: (
     *    string
     *   |value-of<CreateMemberListsRequestTimestampOptOne>
     * )|null,
     *   timestampSignup?: (
     *    string
     *   |value-of<CreateMemberListsRequestTimestampSignupOne>
     * )|null,
     *   vip?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->skipMergeValidation = $values['skipMergeValidation'] ?? null;
        $this->emailAddress = $values['emailAddress'];
        $this->emailType = $values['emailType'] ?? null;
        $this->interests = $values['interests'] ?? null;
        $this->ipOpt = $values['ipOpt'] ?? null;
        $this->ipSignup = $values['ipSignup'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->location = $values['location'] ?? null;
        $this->marketingPermissions = $values['marketingPermissions'] ?? null;
        $this->mergeFields = $values['mergeFields'] ?? null;
        $this->status = $values['status'];
        $this->tags = $values['tags'] ?? null;
        $this->timestampOpt = $values['timestampOpt'] ?? null;
        $this->timestampSignup = $values['timestampSignup'] ?? null;
        $this->vip = $values['vip'] ?? null;
    }
}
