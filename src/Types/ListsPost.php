<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Individuals who are currently or have been previously subscribed to this list, including members who have bounced or unsubscribed.
 */
class ListsPost extends JsonSerializableType
{
    /**
     * @var ?array<ListsPostLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListsPostLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $contactId A unique ID for the contact record.
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
     * @var ?string $emailType Type of email this member asked to get ('html' or 'text').
     */
    #[JsonProperty('email_type')]
    public ?string $emailType;

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
     * @var ?ListsPostLastNote $lastNote The most recent Note added about this member.
     */
    #[JsonProperty('last_note')]
    public ?ListsPostLastNote $lastNote;

    /**
     * @var ?string $listId The list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?ListsPostLocation $location Subscriber location information.
     */
    #[JsonProperty('location')]
    public ?ListsPostLocation $location;

    /**
     * @var ?int $memberRating Star rating for this member, between 1 and 5.
     */
    #[JsonProperty('member_rating')]
    public ?int $memberRating;

    /**
     * @var ?array<string, mixed> $mergeFields An individual merge var and value for a member.
     */
    #[JsonProperty('merge_fields'), ArrayType(['string' => 'mixed'])]
    public ?array $mergeFields;

    /**
     * @var ?ListsPostStats $stats Open and click rates for this subscriber.
     */
    #[JsonProperty('stats')]
    public ?ListsPostStats $stats;

    /**
     * @var ?value-of<ListsPostStatus> $status Subscriber's current status.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<ListsPostTagsItem> $tags The tags applied to this member.
     */
    #[JsonProperty('tags'), ArrayType([ListsPostTagsItem::class])]
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
     * @var ?bool $vip [VIP status](https://mailchimp.com/help/designate-and-send-to-vip-contacts/) for subscriber.
     */
    #[JsonProperty('vip')]
    public ?bool $vip;

    /**
     * @param array{
     *   links?: ?array<ListsPostLinksItem>,
     *   contactId?: ?string,
     *   emailAddress?: ?string,
     *   emailClient?: ?string,
     *   emailType?: ?string,
     *   id?: ?string,
     *   interests?: ?array<string, bool>,
     *   ipOpt?: ?string,
     *   ipSignup?: ?string,
     *   language?: ?string,
     *   lastChanged?: ?DateTime,
     *   lastNote?: ?ListsPostLastNote,
     *   listId?: ?string,
     *   location?: ?ListsPostLocation,
     *   memberRating?: ?int,
     *   mergeFields?: ?array<string, mixed>,
     *   stats?: ?ListsPostStats,
     *   status?: ?value-of<ListsPostStatus>,
     *   tags?: ?array<ListsPostTagsItem>,
     *   tagsCount?: ?int,
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
        $this->memberRating = $values['memberRating'] ?? null;
        $this->mergeFields = $values['mergeFields'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->tagsCount = $values['tagsCount'] ?? null;
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
