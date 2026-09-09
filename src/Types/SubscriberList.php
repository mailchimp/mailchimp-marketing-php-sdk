<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Information about a specific list.
 */
class SubscriberList extends JsonSerializableType
{
    /**
     * @var ?array<SubscriberListLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([SubscriberListLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $beamerAddress The list's [Email Beamer](https://mailchimp.com/help/use-email-beamer-to-create-a-campaign/) address.
     */
    #[JsonProperty('beamer_address')]
    public ?string $beamerAddress;

    /**
     * @var ?SubscriberListCampaignDefaults $campaignDefaults [Default values for campaigns](https://mailchimp.com/help/edit-your-emails-subject-preview-text-from-name-or-from-email-address/) created for this list.
     */
    #[JsonProperty('campaign_defaults')]
    public ?SubscriberListCampaignDefaults $campaignDefaults;

    /**
     * @var ?SubscriberListContact $contact [Contact information displayed in campaign footers](https://mailchimp.com/help/about-campaign-footers/) to comply with international spam laws.
     */
    #[JsonProperty('contact')]
    public ?SubscriberListContact $contact;

    /**
     * @var ?DateTime $dateCreated The date and time that this list was created in ISO 8601 format.
     */
    #[JsonProperty('date_created'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $dateCreated;

    /**
     * @var ?bool $doubleOptin Whether or not to require the subscriber to confirm subscription via email.
     */
    #[JsonProperty('double_optin')]
    public ?bool $doubleOptin;

    /**
     * @var ?bool $emailTypeOption Whether the list supports [multiple formats for emails](https://mailchimp.com/help/audience-settings-and-defaults/). When set to `true`, subscribers can choose whether they want to receive HTML or plain-text emails. When set to `false`, subscribers will receive HTML emails, with a plain-text alternative backup.
     */
    #[JsonProperty('email_type_option')]
    public ?bool $emailTypeOption;

    /**
     * @var ?bool $hasWelcome Whether or not this list has a welcome automation connected. Welcome Automations: welcomeSeries, singleWelcome, emailFollowup.
     */
    #[JsonProperty('has_welcome')]
    public ?bool $hasWelcome;

    /**
     * @var ?string $id A string that uniquely identifies this list.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?int $listRating An auto-generated activity score for the list (0-5).
     */
    #[JsonProperty('list_rating')]
    public ?int $listRating;

    /**
     * @var ?bool $marketingPermissions Whether or not the list has marketing permissions (eg. GDPR) enabled.
     */
    #[JsonProperty('marketing_permissions')]
    public ?bool $marketingPermissions;

    /**
     * @var ?array<string> $modules Any list-specific modules installed for this list.
     */
    #[JsonProperty('modules'), ArrayType(['string'])]
    public ?array $modules;

    /**
     * @var ?string $name The name of the list.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $notifyOnSubscribe The email address to send [subscribe notifications](https://mailchimp.com/help/change-subscribe-and-unsubscribe-notifications/) to.
     */
    #[JsonProperty('notify_on_subscribe')]
    public ?string $notifyOnSubscribe;

    /**
     * @var ?string $notifyOnUnsubscribe The email address to send [unsubscribe notifications](https://mailchimp.com/help/change-subscribe-and-unsubscribe-notifications/) to.
     */
    #[JsonProperty('notify_on_unsubscribe')]
    public ?string $notifyOnUnsubscribe;

    /**
     * @var ?string $permissionReminder The [permission reminder](https://mailchimp.com/help/edit-the-permission-reminder/) for the list.
     */
    #[JsonProperty('permission_reminder')]
    public ?string $permissionReminder;

    /**
     * @var ?SubscriberListStats $stats Stats for the list. Many of these are cached for at least five minutes.
     */
    #[JsonProperty('stats')]
    public ?SubscriberListStats $stats;

    /**
     * @var ?string $subscribeUrlLong The full version of this list's subscribe form (host will vary).
     */
    #[JsonProperty('subscribe_url_long')]
    public ?string $subscribeUrlLong;

    /**
     * @var ?string $subscribeUrlShort Our [url shortened](https://mailchimp.com/help/share-your-signup-form/) version of this list's subscribe form.
     */
    #[JsonProperty('subscribe_url_short')]
    public ?string $subscribeUrlShort;

    /**
     * @var ?bool $useArchiveBar Whether campaigns for this list use the [Archive Bar](https://mailchimp.com/help/about-email-campaign-archives-and-pages/) in archives by default.
     */
    #[JsonProperty('use_archive_bar')]
    public ?bool $useArchiveBar;

    /**
     * @var ?value-of<SubscriberListVisibility> $visibility Legacy - visibility settings are no longer used
     */
    #[JsonProperty('visibility')]
    public ?string $visibility;

    /**
     * @var ?int $webId The ID used in the Mailchimp web application. View this list in your Mailchimp account at `https://{dc}.admin.mailchimp.com/lists/members/?id={web_id}`.
     */
    #[JsonProperty('web_id')]
    public ?int $webId;

    /**
     * @param array{
     *   links?: ?array<SubscriberListLinksItem>,
     *   beamerAddress?: ?string,
     *   campaignDefaults?: ?SubscriberListCampaignDefaults,
     *   contact?: ?SubscriberListContact,
     *   dateCreated?: ?DateTime,
     *   doubleOptin?: ?bool,
     *   emailTypeOption?: ?bool,
     *   hasWelcome?: ?bool,
     *   id?: ?string,
     *   listRating?: ?int,
     *   marketingPermissions?: ?bool,
     *   modules?: ?array<string>,
     *   name?: ?string,
     *   notifyOnSubscribe?: ?string,
     *   notifyOnUnsubscribe?: ?string,
     *   permissionReminder?: ?string,
     *   stats?: ?SubscriberListStats,
     *   subscribeUrlLong?: ?string,
     *   subscribeUrlShort?: ?string,
     *   useArchiveBar?: ?bool,
     *   visibility?: ?value-of<SubscriberListVisibility>,
     *   webId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->beamerAddress = $values['beamerAddress'] ?? null;
        $this->campaignDefaults = $values['campaignDefaults'] ?? null;
        $this->contact = $values['contact'] ?? null;
        $this->dateCreated = $values['dateCreated'] ?? null;
        $this->doubleOptin = $values['doubleOptin'] ?? null;
        $this->emailTypeOption = $values['emailTypeOption'] ?? null;
        $this->hasWelcome = $values['hasWelcome'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->listRating = $values['listRating'] ?? null;
        $this->marketingPermissions = $values['marketingPermissions'] ?? null;
        $this->modules = $values['modules'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->notifyOnSubscribe = $values['notifyOnSubscribe'] ?? null;
        $this->notifyOnUnsubscribe = $values['notifyOnUnsubscribe'] ?? null;
        $this->permissionReminder = $values['permissionReminder'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->subscribeUrlLong = $values['subscribeUrlLong'] ?? null;
        $this->subscribeUrlShort = $values['subscribeUrlShort'] ?? null;
        $this->useArchiveBar = $values['useArchiveBar'] ?? null;
        $this->visibility = $values['visibility'] ?? null;
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
