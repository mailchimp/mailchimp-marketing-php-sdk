<?php

namespace Mailchimp\Ecommerce\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Ecommerce\Types\UpsertStoreCustomerEcommerceRequestAddress;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

class UpsertStoreCustomerEcommerceRequest extends JsonSerializableType
{
    /**
     * @var ?UpsertStoreCustomerEcommerceRequestAddress $address The customer's address.
     */
    #[JsonProperty('address')]
    public ?UpsertStoreCustomerEcommerceRequestAddress $address;

    /**
     * @var ?string $company The customer's company.
     */
    #[JsonProperty('company')]
    public ?string $company;

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
     * @var ?string $id A unique identifier for the customer. Limited to 50 characters.
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
     * @param array{
     *   address?: ?UpsertStoreCustomerEcommerceRequestAddress,
     *   company?: ?string,
     *   emailAddress?: ?string,
     *   firstName?: ?string,
     *   id?: ?string,
     *   lastName?: ?string,
     *   optInStatus?: ?bool,
     *   smsPhoneNumber?: ?string,
     *   totalSpent?: (
     *    float
     *   |string
     * )|null,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->address = $values['address'] ?? null;
        $this->company = $values['company'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->optInStatus = $values['optInStatus'] ?? null;
        $this->smsPhoneNumber = $values['smsPhoneNumber'] ?? null;
        $this->totalSpent = $values['totalSpent'] ?? null;
    }
}
