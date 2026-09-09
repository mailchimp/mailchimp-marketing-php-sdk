<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;
use Mailchimp\Core\Types\Union;

/**
 * Information about a specific customer.
 */
class ECommerceCustomer extends JsonSerializableType
{
    /**
     * @var ?array<ECommerceCustomerLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ECommerceCustomerLinksItem::class])]
    public ?array $links;

    /**
     * @var ?ECommerceCustomerAddress $address The customer's address.
     */
    #[JsonProperty('address')]
    public ?ECommerceCustomerAddress $address;

    /**
     * @var ?string $company The customer's company.
     */
    #[JsonProperty('company')]
    public ?string $company;

    /**
     * @var ?DateTime $createdAt The date and time the customer was created in ISO 8601 format.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $emailAddress The customer's email address.
     */
    #[JsonProperty('email_address')]
    public ?string $emailAddress;

    /**
     * @var ?string $firstName The customer's first name.
     */
    #[JsonProperty('first_name')]
    public ?string $firstName;

    /**
     * @var ?string $id A unique identifier for the customer.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $lastName The customer's last name.
     */
    #[JsonProperty('last_name')]
    public ?string $lastName;

    /**
     * @var ?bool $optInStatus The customer's opt-in status. This value will never overwrite the opt-in status of a pre-existing Mailchimp list member, but will apply to list members that are added through the e-commerce API endpoints. Customers who don't opt in to your Mailchimp list [will be added as `Transactional` members](https://mailchimp.com/developer/marketing/docs/e-commerce/#customers).
     */
    #[JsonProperty('opt_in_status')]
    public ?bool $optInStatus;

    /**
     * @var ?int $ordersCount The customer's total order count.
     */
    #[JsonProperty('orders_count')]
    public ?int $ordersCount;

    /**
     * @var ?string $smsPhoneNumber A US phone number for SMS contact.
     */
    #[JsonProperty('sms_phone_number')]
    public ?string $smsPhoneNumber;

    /**
     * @var (
     *    float
     *   |string
     * )|null $totalSpent
     */
    #[JsonProperty('total_spent'), Union('float', 'string', 'null')]
    public float|string|null $totalSpent;

    /**
     * @var ?DateTime $updatedAt The date and time the customer was last updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   links?: ?array<ECommerceCustomerLinksItem>,
     *   address?: ?ECommerceCustomerAddress,
     *   company?: ?string,
     *   createdAt?: ?DateTime,
     *   emailAddress?: ?string,
     *   firstName?: ?string,
     *   id?: ?string,
     *   lastName?: ?string,
     *   optInStatus?: ?bool,
     *   ordersCount?: ?int,
     *   smsPhoneNumber?: ?string,
     *   totalSpent?: (
     *    float
     *   |string
     * )|null,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->address = $values['address'] ?? null;
        $this->company = $values['company'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->optInStatus = $values['optInStatus'] ?? null;
        $this->ordersCount = $values['ordersCount'] ?? null;
        $this->smsPhoneNumber = $values['smsPhoneNumber'] ?? null;
        $this->totalSpent = $values['totalSpent'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
