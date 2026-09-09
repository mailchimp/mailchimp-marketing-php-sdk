<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;
use Mailchimp\Core\Types\Union;

/**
 * Individuals who are currently or have been previously subscribed to this list, including members who have bounced or unsubscribed.
 */
class ListMembers extends JsonSerializableType
{
    /**
     * @var ?array<ListMembersLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListMembersLinksItem::class])]
    public ?array $links;

    /**
     * @var ?bool $consentsToOneToOneMessaging Indicates whether a contact consents to 1:1 messaging.
     */
    #[JsonProperty('consents_to_one_to_one_messaging')]
    public ?bool $consentsToOneToOneMessaging;

    /**
     * @var ?string $contactId As Mailchimp evolves beyond email, you may eventually have contacts without email addresses. While the `id` is the MD5 hash of their email address, this `contact_id` is agnostic of contact’s inclusion of an email address.
     */
    #[JsonProperty('contact_id')]
    public ?string $contactId;

    /**
     * @var ?string $emailAddress Email address for a subscriber.
     */
    #[JsonProperty('email_address')]
    public ?string $emailAddress;

    /**
     * @var ?string $emailClient The list member's email client.
     */
    #[JsonProperty('email_client')]
    public ?string $emailClient;

    /**
     * @var mixed $emailType Type of email this member asked to get ('html' or 'text').
     */
    #[JsonProperty('email_type')]
    public mixed $emailType;

    /**
     * @var ?string $id The MD5 hash of the lowercase version of the list member's email address.
     */
    #[JsonProperty('id')]
    public ?string $id;

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
     * @var ?DateTime $lastChanged The date and time the member's info was last changed in ISO 8601 format.
     */
    #[JsonProperty('last_changed'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastChanged;

    /**
     * @var ?ListMembersLastNote $lastNote The most recent Note added about this member.
     */
    #[JsonProperty('last_note')]
    public ?ListMembersLastNote $lastNote;

    /**
     * @var ?string $listId The list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?ListMembersLocation $location Subscriber location information.
     */
    #[JsonProperty('location')]
    public ?ListMembersLocation $location;

    /**
     * @var ?array<ListMembersMarketingPermissionsItem> $marketingPermissions The marketing permissions for the subscriber.
     */
    #[JsonProperty('marketing_permissions'), ArrayType([ListMembersMarketingPermissionsItem::class])]
    public ?array $marketingPermissions;

    /**
     * @var ?int $memberRating Star rating for this member, between 1 and 5.
     */
    #[JsonProperty('member_rating')]
    public ?int $memberRating;

    /**
     * @var ?array<string, (
     *    ListMembersMergeFieldsValueAddr1
     *   |string
     *   |float
     * )> $mergeFields A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string' => new Union(ListMembersMergeFieldsValueAddr1::class, 'string', 'float')])]
    public ?array $mergeFields;

    /**
     * @var ?string $smsPhoneNumber A US phone number for SMS contact.
     */
    #[JsonProperty('sms_phone_number')]
    public ?string $smsPhoneNumber;

    /**
     * @var ?string $smsSubscriptionLastUpdated The datetime when the SMS subscription was last updated
     */
    #[JsonProperty('sms_subscription_last_updated')]
    public ?string $smsSubscriptionLastUpdated;

    /**
     * @var ?value-of<ListMembersSmsSubscriptionStatus> $smsSubscriptionStatus The status of an SMS subscription.
     */
    #[JsonProperty('sms_subscription_status')]
    public ?string $smsSubscriptionStatus;

    /**
     * @var ?string $source The source from which the subscriber was added to this list.
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?ListMembersStats $stats Open and click rates for this subscriber.
     */
    #[JsonProperty('stats')]
    public ?ListMembersStats $stats;

    /**
     * @var ?value-of<ListMembersStatus> $status Subscriber's current status.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<ListMembersTagsItem> $tags Returns up to 50 tags applied to this member. To retrieve all tags see [Member Tags](https://mailchimp.com/developer/marketing/api/list-member-tags/).
     */
    #[JsonProperty('tags'), ArrayType([ListMembersTagsItem::class])]
    public ?array $tags;

    /**
     * @var ?int $tagsCount The number of tags applied to this member.
     */
    #[JsonProperty('tags_count')]
    public ?int $tagsCount;

    /**
     * @var ?DateTime $timestampOpt The date and time the subscriber confirmed their opt-in status in ISO 8601 format.
     */
    #[JsonProperty('timestamp_opt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $timestampOpt;

    /**
     * @var ?DateTime $timestampSignup The date and time the subscriber signed up for the list in ISO 8601 format.
     */
    #[JsonProperty('timestamp_signup'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $timestampSignup;

    /**
     * @var ?string $uniqueEmailId An identifier for the address across all of Mailchimp.
     */
    #[JsonProperty('unique_email_id')]
    public ?string $uniqueEmailId;

    /**
     * @var ?string $unsubscribeReason A subscriber's reason for unsubscribing.
     */
    #[JsonProperty('unsubscribe_reason')]
    public ?string $unsubscribeReason;

    /**
     * @var ?bool $vip [VIP status](https://mailchimp.com/help/designate-and-send-to-vip-contacts/) for subscriber.
     */
    #[JsonProperty('vip')]
    public ?bool $vip;

    /**
     * @var ?int $webId The ID used in the Mailchimp web application. View this member in your Mailchimp account at `https://{dc}.admin.mailchimp.com/lists/members/view?id={web_id}`.
     */
    #[JsonProperty('web_id')]
    public ?int $webId;

    /**
     * @param array{
     *   links?: ?array<ListMembersLinksItem>,
     *   consentsToOneToOneMessaging?: ?bool,
     *   contactId?: ?string,
     *   emailAddress?: ?string,
     *   emailClient?: ?string,
     *   emailType?: mixed,
     *   id?: ?string,
     *   interests?: ?array<string, bool>,
     *   ipOpt?: ?string,
     *   ipSignup?: ?string,
     *   language?: ?string,
     *   lastChanged?: ?DateTime,
     *   lastNote?: ?ListMembersLastNote,
     *   listId?: ?string,
     *   location?: ?ListMembersLocation,
     *   marketingPermissions?: ?array<ListMembersMarketingPermissionsItem>,
     *   memberRating?: ?int,
     *   mergeFields?: ?array<string, (
     *    ListMembersMergeFieldsValueAddr1
     *   |string
     *   |float
     * )>,
     *   smsPhoneNumber?: ?string,
     *   smsSubscriptionLastUpdated?: ?string,
     *   smsSubscriptionStatus?: ?value-of<ListMembersSmsSubscriptionStatus>,
     *   source?: ?string,
     *   stats?: ?ListMembersStats,
     *   status?: ?value-of<ListMembersStatus>,
     *   tags?: ?array<ListMembersTagsItem>,
     *   tagsCount?: ?int,
     *   timestampOpt?: ?DateTime,
     *   timestampSignup?: ?DateTime,
     *   uniqueEmailId?: ?string,
     *   unsubscribeReason?: ?string,
     *   vip?: ?bool,
     *   webId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->consentsToOneToOneMessaging = $values['consentsToOneToOneMessaging'] ?? null;
        $this->contactId = $values['contactId'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->emailClient = $values['emailClient'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->interests = $values['interests'] ?? null;
        $this->ipOpt = $values['ipOpt'] ?? null;
        $this->ipSignup = $values['ipSignup'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->lastChanged = $values['lastChanged'] ?? null;
        $this->lastNote = $values['lastNote'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->location = $values['location'] ?? null;
        $this->marketingPermissions = $values['marketingPermissions'] ?? null;
        $this->memberRating = $values['memberRating'] ?? null;
        $this->mergeFields = $values['mergeFields'] ?? null;
        $this->smsPhoneNumber = $values['smsPhoneNumber'] ?? null;
        $this->smsSubscriptionLastUpdated = $values['smsSubscriptionLastUpdated'] ?? null;
        $this->smsSubscriptionStatus = $values['smsSubscriptionStatus'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->tagsCount = $values['tagsCount'] ?? null;
        $this->timestampOpt = $values['timestampOpt'] ?? null;
        $this->timestampSignup = $values['timestampSignup'] ?? null;
        $this->uniqueEmailId = $values['uniqueEmailId'] ?? null;
        $this->unsubscribeReason = $values['unsubscribeReason'] ?? null;
        $this->vip = $values['vip'] ?? null;
        $this->webId = $values['webId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
