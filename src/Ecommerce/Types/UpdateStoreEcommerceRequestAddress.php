<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

/**
 * The store address.
 */
class UpdateStoreEcommerceRequestAddress extends JsonSerializableType
{
    /**
     * @var ?string $address1 The store's mailing address.
     */
    #[JsonProperty('address1')]
    public ?string $address1;

    /**
     * @var ?string $address2 An additional field for the store's mailing address.
     */
    #[JsonProperty('address2')]
    public ?string $address2;

    /**
     * @var ?string $city The city the store is located in.
     */
    #[JsonProperty('city')]
    public ?string $city;

    /**
     * @var ?string $country The store's country.
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $countryCode The two-letter code for to the store's country.
     */
    #[JsonProperty('country_code')]
    public ?string $countryCode;

    /**
     * @var (
     *    float
     *   |string
     * )|null $latitude The latitude of the store location.
     */
    #[JsonProperty('latitude'), Union('float', 'string', 'null')]
    public float|string|null $latitude;

    /**
     * @var (
     *    float
     *   |string
     * )|null $longitude The longitude of the store location.
     */
    #[JsonProperty('longitude'), Union('float', 'string', 'null')]
    public float|string|null $longitude;

    /**
     * @var ?string $postalCode The store's postal or zip code.
     */
    #[JsonProperty('postal_code')]
    public ?string $postalCode;

    /**
     * @var ?string $province The store's state name or normalized province.
     */
    #[JsonProperty('province')]
    public ?string $province;

    /**
     * @var ?string $provinceCode The two-letter code for the store's province or state.
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
     *   latitude?: (
     *    float
     *   |string
     * )|null,
     *   longitude?: (
     *    float
     *   |string
     * )|null,
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
        $this->latitude = $values['latitude'] ?? null;
        $this->longitude = $values['longitude'] ?? null;
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
