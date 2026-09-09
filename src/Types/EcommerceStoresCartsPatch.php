<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

/**
 * Information about a specific customer. Orders for existing customers should include only the `id` parameter in the `customer` object body.
 */
class EcommerceStoresCartsPatch extends JsonSerializableType
{
    /**
     * @var ?string $id A unique identifier for the customer. Limited to 50 characters.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?EcommerceStoresCartsPatchAddress $address The customer's address.
     */
    #[JsonProperty('address')]
    public ?EcommerceStoresCartsPatchAddress $address;

    /**
     * @var ?string $company The customer's company.
     */
    #[JsonProperty('company')]
    public ?string $company;

    /**
     * @var ?string $firstName The customer's first name.
     */
    #[JsonProperty('first_name')]
    public ?string $firstName;

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
     * @var (
     *    float
     *   |string
     * )|null $totalSpent
     */
    #[JsonProperty('total_spent'), Union('float', 'string', 'null')]
    public float|string|null $totalSpent;

    /**
     * @param array{
     *   id?: ?string,
     *   address?: ?EcommerceStoresCartsPatchAddress,
     *   company?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   optInStatus?: ?bool,
     *   totalSpent?: (
     *    float
     *   |string
     * )|null,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->address = $values['address'] ?? null;
        $this->company = $values['company'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->optInStatus = $values['optInStatus'] ?? null;
        $this->totalSpent = $values['totalSpent'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
