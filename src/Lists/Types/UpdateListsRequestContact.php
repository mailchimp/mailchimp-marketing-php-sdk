<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * [Contact information displayed in campaign footers](https://mailchimp.com/help/about-campaign-footers/) to comply with international spam laws.
 */
class UpdateListsRequestContact extends JsonSerializableType
{
    /**
     * @var ?string $address1 The street address for the list contact.
     */
    #[JsonProperty('address1')]
    public ?string $address1;

    /**
     * @var ?string $address2 The street address for the list contact.
     */
    #[JsonProperty('address2')]
    public ?string $address2;

    /**
     * @var ?string $city The city for the list contact.
     */
    #[JsonProperty('city')]
    public ?string $city;

    /**
     * @var ?string $company The company name for the list.
     */
    #[JsonProperty('company')]
    public ?string $company;

    /**
     * @var ?string $country A two-character ISO3166 country code. Defaults to US if invalid.
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $phone The phone number for the list contact.
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $state The state for the list contact.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $zip The postal or zip code for the list contact.
     */
    #[JsonProperty('zip')]
    public ?string $zip;

    /**
     * @param array{
     *   address1?: ?string,
     *   address2?: ?string,
     *   city?: ?string,
     *   company?: ?string,
     *   country?: ?string,
     *   phone?: ?string,
     *   state?: ?string,
     *   zip?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->address1 = $values['address1'] ?? null;
        $this->address2 = $values['address2'] ?? null;
        $this->city = $values['city'] ?? null;
        $this->company = $values['company'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->phone = $values['phone'] ?? null;
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
