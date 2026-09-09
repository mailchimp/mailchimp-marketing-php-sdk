<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class ListLocationsListsResponseLocationsItem extends JsonSerializableType
{
    /**
     * @var ?string $cc The ISO 3166 2 digit country code.
     */
    #[JsonProperty('cc')]
    public ?string $cc;

    /**
     * @var ?string $country The name of the country.
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?float $percent The percent of subscribers in the country.
     */
    #[JsonProperty('percent')]
    public ?float $percent;

    /**
     * @var ?int $total The total number of subscribers in the country.
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @param array{
     *   cc?: ?string,
     *   country?: ?string,
     *   percent?: ?float,
     *   total?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cc = $values['cc'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->percent = $values['percent'] ?? null;
        $this->total = $values['total'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
