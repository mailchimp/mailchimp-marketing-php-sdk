<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Lists\Types\UpdateMemberListsRequestLocation;
use Mailchimp\Lists\Types\UpdateMemberListsRequestMarketingPermissionsItem;
use Mailchimp\Lists\Types\UpdateMemberListsRequestMergeFieldsValueAddr1;
use Mailchimp\Core\Types\Union;
use Mailchimp\Lists\Types\UpdateMemberListsRequestStatus;
use Mailchimp\Lists\Types\UpdateMemberListsRequestTimestampOptOne;
use Mailchimp\Lists\Types\UpdateMemberListsRequestTimestampSignupOne;

class UpdateMemberListsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $skipMergeValidation If skip_merge_validation is true, member data will be accepted without merge field values, even if the merge field is usually required. This defaults to false.
     */
    public ?bool $skipMergeValidation;

    /**
     * @var ?string $emailAddress Email address for a subscriber.
     */
    #[JsonProperty('email_address')]
    public ?string $emailAddress;

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
     * @var ?UpdateMemberListsRequestLocation $location Subscriber location information.
     */
    #[JsonProperty('location')]
    public ?UpdateMemberListsRequestLocation $location;

    /**
     * @var ?array<UpdateMemberListsRequestMarketingPermissionsItem> $marketingPermissions The marketing permissions for the subscriber.
     */
    #[JsonProperty('marketing_permissions'), ArrayType([UpdateMemberListsRequestMarketingPermissionsItem::class])]
    public ?array $marketingPermissions;

    /**
     * @var ?array<string, (
     *    UpdateMemberListsRequestMergeFieldsValueAddr1
     *   |string
     *   |float
     * )> $mergeFields A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string' => new Union(UpdateMemberListsRequestMergeFieldsValueAddr1::class, 'string', 'float')])]
    public ?array $mergeFields;

    /**
     * @var ?value-of<UpdateMemberListsRequestStatus> $status Subscriber's current status.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var (
     *    string
     *   |value-of<UpdateMemberListsRequestTimestampOptOne>
     * )|null $timestampOpt
     */
    #[JsonProperty('timestamp_opt'), Union('string', 'null')]
    public string|null $timestampOpt;

    /**
     * @var (
     *    string
     *   |value-of<UpdateMemberListsRequestTimestampSignupOne>
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
     *   skipMergeValidation?: ?bool,
     *   emailAddress?: ?string,
     *   emailType?: ?string,
     *   interests?: ?array<string, bool>,
     *   ipOpt?: ?string,
     *   ipSignup?: ?string,
     *   language?: ?string,
     *   location?: ?UpdateMemberListsRequestLocation,
     *   marketingPermissions?: ?array<UpdateMemberListsRequestMarketingPermissionsItem>,
     *   mergeFields?: ?array<string, (
     *    UpdateMemberListsRequestMergeFieldsValueAddr1
     *   |string
     *   |float
     * )>,
     *   status?: ?value-of<UpdateMemberListsRequestStatus>,
     *   timestampOpt?: (
     *    string
     *   |value-of<UpdateMemberListsRequestTimestampOptOne>
     * )|null,
     *   timestampSignup?: (
     *    string
     *   |value-of<UpdateMemberListsRequestTimestampSignupOne>
     * )|null,
     *   vip?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->skipMergeValidation = $values['skipMergeValidation'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->interests = $values['interests'] ?? null;
        $this->ipOpt = $values['ipOpt'] ?? null;
        $this->ipSignup = $values['ipSignup'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->location = $values['location'] ?? null;
        $this->marketingPermissions = $values['marketingPermissions'] ?? null;
        $this->mergeFields = $values['mergeFields'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->timestampOpt = $values['timestampOpt'] ?? null;
        $this->timestampSignup = $values['timestampSignup'] ?? null;
        $this->vip = $values['vip'] ?? null;
    }
}
