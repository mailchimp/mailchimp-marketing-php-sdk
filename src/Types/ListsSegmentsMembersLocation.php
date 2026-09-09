<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Subscriber location information.
 */
class ListsSegmentsMembersLocation extends JsonSerializableType
{
    /**
     * @var ?string $countryCode The unique code for the location country.
     */
    #[JsonProperty('country_code')]
    public ?string $countryCode;

    /**
     * @var ?int $dstoff The offset for timezones where daylight saving time is observed.
     */
    #[JsonProperty('dstoff')]
    public ?int $dstoff;

    /**
     * @var ?int $gmtoff The time difference in hours from GMT.
     */
    #[JsonProperty('gmtoff')]
    public ?int $gmtoff;

    /**
     * @var ?float $latitude The location latitude.
     */
    #[JsonProperty('latitude')]
    public ?float $latitude;

    /**
     * @var ?float $longitude The location longitude.
     */
    #[JsonProperty('longitude')]
    public ?float $longitude;

    /**
     * @var ?string $timezone The timezone for the location.
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @param array{
     *   countryCode?: ?string,
     *   dstoff?: ?int,
     *   gmtoff?: ?int,
     *   latitude?: ?float,
     *   longitude?: ?float,
     *   timezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->countryCode = $values['countryCode'] ?? null;
        $this->dstoff = $values['dstoff'] ?? null;
        $this->gmtoff = $values['gmtoff'] ?? null;
        $this->latitude = $values['latitude'] ?? null;
        $this->longitude = $values['longitude'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
