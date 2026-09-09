<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;
use Mailchimp\Core\Types\ArrayType;

/**
 * A summary of the click-throughs on the campaign's URL.
 */
class ListEepurlReportsResponseClicks extends JsonSerializableType
{
    /**
     * @var ?int $clicks The total number of clicks to the campaign's URL.
     */
    #[JsonProperty('clicks')]
    public ?int $clicks;

    /**
     * @var ?DateTime $firstClick The timestamp for the first click to the URL.
     */
    #[JsonProperty('first_click'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $firstClick;

    /**
     * @var ?DateTime $lastClick The timestamp for the last click to the URL.
     */
    #[JsonProperty('last_click'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastClick;

    /**
     * @var ?array<ListEepurlReportsResponseClicksLocationsItem> $locations A summary of the top click locations.
     */
    #[JsonProperty('locations'), ArrayType([ListEepurlReportsResponseClicksLocationsItem::class])]
    public ?array $locations;

    /**
     * @param array{
     *   clicks?: ?int,
     *   firstClick?: ?DateTime,
     *   lastClick?: ?DateTime,
     *   locations?: ?array<ListEepurlReportsResponseClicksLocationsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clicks = $values['clicks'] ?? null;
        $this->firstClick = $values['firstClick'] ?? null;
        $this->lastClick = $values['lastClick'] ?? null;
        $this->locations = $values['locations'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
