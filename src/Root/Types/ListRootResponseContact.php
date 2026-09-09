<?php

namespace Mailchimp\Root\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Information about the account contact.
 */
class ListRootResponseContact extends JsonSerializableType
{
    /**
     * @var ?string $addr1 The street address for the account contact.
     */
    #[JsonProperty('addr1')]
    public ?string $addr1;

    /**
     * @var ?string $addr2 The street address for the account contact.
     */
    #[JsonProperty('addr2')]
    public ?string $addr2;

    /**
     * @var ?string $city The city for the account contact.
     */
    #[JsonProperty('city')]
    public ?string $city;

    /**
     * @var ?string $company The company name for the account.
     */
    #[JsonProperty('company')]
    public ?string $company;

    /**
     * @var ?string $country The country for the account contact.
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $state The state for the account contact.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $zip The zip code for the account contact.
     */
    #[JsonProperty('zip')]
    public ?string $zip;

    /**
     * @param array{
     *   addr1?: ?string,
     *   addr2?: ?string,
     *   city?: ?string,
     *   company?: ?string,
     *   country?: ?string,
     *   state?: ?string,
     *   zip?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->addr1 = $values['addr1'] ?? null;
        $this->addr2 = $values['addr2'] ?? null;
        $this->city = $values['city'] ?? null;
        $this->company = $values['company'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->zip = $values['zip'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
