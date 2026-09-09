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
class ListsSegmentsMembers extends JsonSerializableType
{
    /**
     * @var ?array<ListsSegmentsMembersLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListsSegmentsMembersLinksItem::class])]
    public ?array $links;

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
     * @var ?string $emailType Type of email this member asked to get ('html' or 'text').
     */
    #[JsonProperty('email_type')]
    public ?string $emailType;

    /**
     * @var ?string $fullName The contact's full name.
     */
    #[JsonProperty('full_name')]
    public ?string $fullName;

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
     * @var ?ListsSegmentsMembersLastNote $lastNote The most recent Note added about this member.
     */
    #[JsonProperty('last_note')]
    public ?ListsSegmentsMembersLastNote $lastNote;

    /**
     * @var ?string $listId The list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?ListsSegmentsMembersLocation $location Subscriber location information.
     */
    #[JsonProperty('location')]
    public ?ListsSegmentsMembersLocation $location;

    /**
     * @var ?int $memberRating Star rating for this member, between 1 and 5.
     */
    #[JsonProperty('member_rating')]
    public ?int $memberRating;

    /**
     * @var ?array<string, (
     *    ListsSegmentsMembersMergeFieldsValueAddr1
     *   |string
     *   |float
     * )> $mergeFields A dictionary of merge fields where the keys are the merge tags. See the [Merge Fields documentation](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for more about the structure.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string' => new Union(ListsSegmentsMembersMergeFieldsValueAddr1::class, 'string', 'float')])]
    public ?array $mergeFields;

    /**
     * @var ?ListsSegmentsMembersStats $stats Open and click rates for this subscriber.
     */
    #[JsonProperty('stats')]
    public ?ListsSegmentsMembersStats $stats;

    /**
     * @var ?value-of<ListsSegmentsMembersStatus> $status Subscriber's current status.
     */
    #[JsonProperty('status')]
    public ?string $status;

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
     * @var ?bool $vip [VIP status](https://mailchimp.com/help/designate-and-send-to-vip-contacts/) for subscriber.
     */
    #[JsonProperty('vip')]
    public ?bool $vip;

    /**
     * @param array{
     *   links?: ?array<ListsSegmentsMembersLinksItem>,
     *   emailAddress?: ?string,
     *   emailClient?: ?string,
     *   emailType?: ?string,
     *   fullName?: ?string,
     *   id?: ?string,
     *   interests?: ?array<string, bool>,
     *   ipOpt?: ?string,
     *   ipSignup?: ?string,
     *   language?: ?string,
     *   lastChanged?: ?DateTime,
     *   lastNote?: ?ListsSegmentsMembersLastNote,
     *   listId?: ?string,
     *   location?: ?ListsSegmentsMembersLocation,
     *   memberRating?: ?int,
     *   mergeFields?: ?array<string, (
     *    ListsSegmentsMembersMergeFieldsValueAddr1
     *   |string
     *   |float
     * )>,
     *   stats?: ?ListsSegmentsMembersStats,
     *   status?: ?value-of<ListsSegmentsMembersStatus>,
     *   timestampOpt?: ?DateTime,
     *   timestampSignup?: ?DateTime,
     *   uniqueEmailId?: ?string,
     *   vip?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->emailClient = $values['emailClient'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->fullName = $values['fullName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->interests = $values['interests'] ?? null;
        $this->ipOpt = $values['ipOpt'] ?? null;
        $this->ipSignup = $values['ipSignup'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->lastChanged = $values['lastChanged'] ?? null;
        $this->lastNote = $values['lastNote'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->location = $values['location'] ?? null;
        $this->memberRating = $values['memberRating'] ?? null;
        $this->mergeFields = $values['mergeFields'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->timestampOpt = $values['timestampOpt'] ?? null;
        $this->timestampSignup = $values['timestampSignup'] ?? null;
        $this->uniqueEmailId = $values['uniqueEmailId'] ?? null;
        $this->vip = $values['vip'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
