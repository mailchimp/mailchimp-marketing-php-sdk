<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Lists\Types\UpdateListsRequestCampaignDefaults;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Lists\Types\UpdateListsRequestContact;

class UpdateListsRequest extends JsonSerializableType
{
    /**
     * @var ?UpdateListsRequestCampaignDefaults $campaignDefaults [Default values for campaigns](https://mailchimp.com/help/edit-your-emails-subject-preview-text-from-name-or-from-email-address/) created for this list.
     */
    #[JsonProperty('campaign_defaults')]
    public ?UpdateListsRequestCampaignDefaults $campaignDefaults;

    /**
     * @var ?UpdateListsRequestContact $contact [Contact information displayed in campaign footers](https://mailchimp.com/help/about-campaign-footers/) to comply with international spam laws.
     */
    #[JsonProperty('contact')]
    public ?UpdateListsRequestContact $contact;

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
     * @var ?bool $marketingPermissions Whether or not the list has marketing permissions (eg. GDPR) enabled.
     */
    #[JsonProperty('marketing_permissions')]
    public ?bool $marketingPermissions;

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
     * @var ?bool $useArchiveBar Whether campaigns for this list use the [Archive Bar](https://mailchimp.com/help/about-email-campaign-archives-and-pages/) in archives by default.
     */
    #[JsonProperty('use_archive_bar')]
    public ?bool $useArchiveBar;

    /**
     * @param array{
     *   campaignDefaults?: ?UpdateListsRequestCampaignDefaults,
     *   contact?: ?UpdateListsRequestContact,
     *   doubleOptin?: ?bool,
     *   emailTypeOption?: ?bool,
     *   marketingPermissions?: ?bool,
     *   name?: ?string,
     *   notifyOnSubscribe?: ?string,
     *   notifyOnUnsubscribe?: ?string,
     *   permissionReminder?: ?string,
     *   useArchiveBar?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaignDefaults = $values['campaignDefaults'] ?? null;
        $this->contact = $values['contact'] ?? null;
        $this->doubleOptin = $values['doubleOptin'] ?? null;
        $this->emailTypeOption = $values['emailTypeOption'] ?? null;
        $this->marketingPermissions = $values['marketingPermissions'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->notifyOnSubscribe = $values['notifyOnSubscribe'] ?? null;
        $this->notifyOnUnsubscribe = $values['notifyOnUnsubscribe'] ?? null;
        $this->permissionReminder = $values['permissionReminder'] ?? null;
        $this->useArchiveBar = $values['useArchiveBar'] ?? null;
    }
}
