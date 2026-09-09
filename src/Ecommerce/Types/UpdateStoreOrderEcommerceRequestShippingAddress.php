<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

/**
 * The shipping address for the order.
 */
class UpdateStoreOrderEcommerceRequestShippingAddress extends JsonSerializableType
{
    /**
     * @var ?string $address1 The shipping address for the order.
     */
    #[JsonProperty('address1')]
    public ?string $address1;

    /**
     * @var ?string $address2 An additional field for the shipping address.
     */
    #[JsonProperty('address2')]
    public ?string $address2;

    /**
     * @var ?string $city The city in the order's shipping address.
     */
    #[JsonProperty('city')]
    public ?string $city;

    /**
     * @var ?string $company The company associated with an order's shipping address.
     */
    #[JsonProperty('company')]
    public ?string $company;

    /**
     * @var ?string $country The country in the order's shipping address.
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $countryCode The two-letter code for the country in the shipping address.
     */
    #[JsonProperty('country_code')]
    public ?string $countryCode;

    /**
     * @var (
     *    float
     *   |string
     * )|null $latitude The latitude for the shipping address location.
     */
    #[JsonProperty('latitude'), Union('float', 'string', 'null')]
    public float|string|null $latitude;

    /**
     * @var (
     *    float
     *   |string
     * )|null $longitude The longitude for the shipping address location.
     */
    #[JsonProperty('longitude'), Union('float', 'string', 'null')]
    public float|string|null $longitude;

    /**
     * @var ?string $name The name associated with an order's shipping address.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $phone The phone number for the order's shipping address
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $postalCode The postal or zip code in the order's shipping address.
     */
    #[JsonProperty('postal_code')]
    public ?string $postalCode;

    /**
     * @var ?string $province The state or normalized province in the order's shipping address.
     */
    #[JsonProperty('province')]
    public ?string $province;

    /**
     * @var ?string $provinceCode The two-letter code for the province or state the order's shipping address is located in.
     */
    #[JsonProperty('province_code')]
    public ?string $provinceCode;

    /**
     * @param array{
     *   address1?: ?string,
     *   address2?: ?string,
     *   city?: ?string,
     *   company?: ?string,
     *   country?: ?string,
     *   countryCode?: ?string,
     *   latitude?: (
     *    float
     *   |string
     * )|null,
     *   longitude?: (
     *    float
     *   |string
     * )|null,
     *   name?: ?string,
     *   phone?: ?string,
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
        $this->company = $values['company'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->countryCode = $values['countryCode'] ?? null;
        $this->latitude = $values['latitude'] ?? null;
        $this->longitude = $values['longitude'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->phone = $values['phone'] ?? null;
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
