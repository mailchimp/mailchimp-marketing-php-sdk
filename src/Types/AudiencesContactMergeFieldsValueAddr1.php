<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class AudiencesContactMergeFieldsValueAddr1 extends JsonSerializableType
{
    /**
     * @var string $addr1
     */
    #[JsonProperty('addr1')]
    public string $addr1;

    /**
     * @var ?string $addr2
     */
    #[JsonProperty('addr2')]
    public ?string $addr2;

    /**
     * @var string $city
     */
    #[JsonProperty('city')]
    public string $city;

    /**
     * @var string $state
     */
    #[JsonProperty('state')]
    public string $state;

    /**
     * @var string $zip
     */
    #[JsonProperty('zip')]
    public string $zip;

    /**
     * @var ?string $country
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @param array{
     *   addr1: string,
     *   city: string,
     *   state: string,
     *   zip: string,
     *   addr2?: ?string,
     *   country?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->addr1 = $values['addr1'];
        $this->addr2 = $values['addr2'] ?? null;
        $this->city = $values['city'];
        $this->state = $values['state'];
        $this->zip = $values['zip'];
        $this->country = $values['country'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
