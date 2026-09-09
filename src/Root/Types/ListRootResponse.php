<?php

namespace Mailchimp\Root\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Union;
use Mailchimp\Core\Types\Date;

/**
 * The API root resource links to all other resources available in the API.
 */
class ListRootResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListRootResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListRootResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $accountId The Mailchimp account ID.
     */
    #[JsonProperty('account_id')]
    public ?string $accountId;

    /**
     * @var ?string $accountIndustry The user-specified industry associated with the account.
     */
    #[JsonProperty('account_industry')]
    public ?string $accountIndustry;

    /**
     * @var ?string $accountName The name of the account.
     */
    #[JsonProperty('account_name')]
    public ?string $accountName;

    /**
     * @var ?string $accountTimezone The timezone currently set for the account.
     */
    #[JsonProperty('account_timezone')]
    public ?string $accountTimezone;

    /**
     * @var ?string $avatarUrl URL of the avatar for the user.
     */
    #[JsonProperty('avatar_url')]
    public ?string $avatarUrl;

    /**
     * @var ?ListRootResponseContact $contact Information about the account contact.
     */
    #[JsonProperty('contact')]
    public ?ListRootResponseContact $contact;

    /**
     * @var ?string $email The account email address.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $firstName The first name tied to the account.
     */
    #[JsonProperty('first_name')]
    public ?string $firstName;

    /**
     * @var (
     *    DateTime
     *   |value-of<ListRootResponseFirstPaymentOne>
     * )|null $firstPayment Date of first payment for monthly plans.
     */
    #[JsonProperty('first_payment'), Union('datetime', 'string', 'null')]
    public DateTime|string|null $firstPayment;

    /**
     * @var ?ListRootResponseIndustryStats $industryStats The [average campaign statistics](https://mailchimp.com/resources/research/email-marketing-benchmarks/?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) for all campaigns in the account's specified industry.
     */
    #[JsonProperty('industry_stats')]
    public ?ListRootResponseIndustryStats $industryStats;

    /**
     * @var ?DateTime $lastLogin The date and time of the last login for this account in ISO 8601 format.
     */
    #[JsonProperty('last_login'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastLogin;

    /**
     * @var ?string $lastName The last name tied to the account.
     */
    #[JsonProperty('last_name')]
    public ?string $lastName;

    /**
     * @var ?string $loginId The ID associated with the user who owns this API key. If you can login to multiple accounts, this ID will be the same for each account.
     */
    #[JsonProperty('login_id')]
    public ?string $loginId;

    /**
     * @var ?DateTime $memberSince The date and time that the account was created in ISO 8601 format.
     */
    #[JsonProperty('member_since'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $memberSince;

    /**
     * @var ?value-of<ListRootResponsePricingPlanType> $pricingPlanType The type of pricing plan the account is on.
     */
    #[JsonProperty('pricing_plan_type')]
    public ?string $pricingPlanType;

    /**
     * @var ?bool $proEnabled Legacy - whether the account includes [Mailchimp Pro](https://mailchimp.com/help/about-legacy-pricing-plan/).
     */
    #[JsonProperty('pro_enabled')]
    public ?bool $proEnabled;

    /**
     * @var ?string $role The [user role](https://mailchimp.com/help/manage-user-levels-in-your-account/) for the account.
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @var ?int $totalSubscribers The total number of subscribers across all lists in the account.
     */
    #[JsonProperty('total_subscribers')]
    public ?int $totalSubscribers;

    /**
     * @var ?string $username The username tied to the account.
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @param array{
     *   links?: ?array<ListRootResponseLinksItem>,
     *   accountId?: ?string,
     *   accountIndustry?: ?string,
     *   accountName?: ?string,
     *   accountTimezone?: ?string,
     *   avatarUrl?: ?string,
     *   contact?: ?ListRootResponseContact,
     *   email?: ?string,
     *   firstName?: ?string,
     *   firstPayment?: (
     *    DateTime
     *   |value-of<ListRootResponseFirstPaymentOne>
     * )|null,
     *   industryStats?: ?ListRootResponseIndustryStats,
     *   lastLogin?: ?DateTime,
     *   lastName?: ?string,
     *   loginId?: ?string,
     *   memberSince?: ?DateTime,
     *   pricingPlanType?: ?value-of<ListRootResponsePricingPlanType>,
     *   proEnabled?: ?bool,
     *   role?: ?string,
     *   totalSubscribers?: ?int,
     *   username?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->accountId = $values['accountId'] ?? null;
        $this->accountIndustry = $values['accountIndustry'] ?? null;
        $this->accountName = $values['accountName'] ?? null;
        $this->accountTimezone = $values['accountTimezone'] ?? null;
        $this->avatarUrl = $values['avatarUrl'] ?? null;
        $this->contact = $values['contact'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->firstPayment = $values['firstPayment'] ?? null;
        $this->industryStats = $values['industryStats'] ?? null;
        $this->lastLogin = $values['lastLogin'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->loginId = $values['loginId'] ?? null;
        $this->memberSince = $values['memberSince'] ?? null;
        $this->pricingPlanType = $values['pricingPlanType'] ?? null;
        $this->proEnabled = $values['proEnabled'] ?? null;
        $this->role = $values['role'] ?? null;
        $this->totalSubscribers = $values['totalSubscribers'] ?? null;
        $this->username = $values['username'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
