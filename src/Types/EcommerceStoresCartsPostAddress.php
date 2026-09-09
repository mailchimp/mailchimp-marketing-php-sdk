<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The customer's address.
 */
class EcommerceStoresCartsPostAddress extends JsonSerializableType
{
    /**
     * @var ?string $address1 The mailing address of the customer.
     */
    #[JsonProperty('address1')]
    public ?string $address1;

    /**
     * @var ?string $address2 An additional field for the customer's mailing address.
     */
    #[JsonProperty('address2')]
    public ?string $address2;

    /**
     * @var ?string $city The city the customer is located in.
     */
    #[JsonProperty('city')]
    public ?string $city;

    /**
     * @var ?string $country The customer's country.
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $countryCode The two-letter code for the customer's country.
     */
    #[JsonProperty('country_code')]
    public ?string $countryCode;

    /**
     * @var ?string $postalCode The customer's postal or zip code.
     */
    #[JsonProperty('postal_code')]
    public ?string $postalCode;

    /**
     * @var ?string $province The customer's state name or normalized province.
     */
    #[JsonProperty('province')]
    public ?string $province;

    /**
     * @var ?string $provinceCode The two-letter code for the customer's province or state.
     */
    #[JsonProperty('province_code')]
    public ?string $provinceCode;

    /**
     * @param array{
     *   address1?: ?string,
     *   address2?: ?string,
     *   city?: ?string,
     *   country?: ?string,
     *   countryCode?: ?string,
     *   postalCode?: ?string,
     *   province?: ?string,
     *   provinceCode?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->address1 = $values['address1'] ?? null;
        $this->address2 = $values['address2'] ?? null;
        $this->city = $values['city'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->countryCode = $values['countryCode'] ?? null;
        $this->postalCode = $values['postalCode'] ?? null;
        $this->province = $values['province'] ?? null;
        $this->provinceCode = $values['provinceCode'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
