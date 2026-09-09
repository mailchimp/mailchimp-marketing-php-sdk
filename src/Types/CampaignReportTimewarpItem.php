<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

class CampaignReportTimewarpItem extends JsonSerializableType
{
    /**
     * @var ?int $bounces The number of bounces.
     */
    #[JsonProperty('bounces')]
    public ?int $bounces;

    /**
     * @var ?int $clicks The number of clicks.
     */
    #[JsonProperty('clicks')]
    public ?int $clicks;

    /**
     * @var ?int $gmtOffset For campaigns sent with timewarp, the time zone group the member is apart of.
     */
    #[JsonProperty('gmt_offset')]
    public ?int $gmtOffset;

    /**
     * @var ?DateTime $lastClick The date and time of the last click in ISO 8601 format.
     */
    #[JsonProperty('last_click'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastClick;

    /**
     * @var ?DateTime $lastOpen The date and time of the last open in ISO 8601 format.
     */
    #[JsonProperty('last_open'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastOpen;

    /**
     * @var ?int $opens The number of opens.
     */
    #[JsonProperty('opens')]
    public ?int $opens;

    /**
     * @var ?int $uniqueClicks The number of unique clicks.
     */
    #[JsonProperty('unique_clicks')]
    public ?int $uniqueClicks;

    /**
     * @var ?int $uniqueOpens The number of unique opens.
     */
    #[JsonProperty('unique_opens')]
    public ?int $uniqueOpens;

    /**
     * @param array{
     *   bounces?: ?int,
     *   clicks?: ?int,
     *   gmtOffset?: ?int,
     *   lastClick?: ?DateTime,
     *   lastOpen?: ?DateTime,
     *   opens?: ?int,
     *   uniqueClicks?: ?int,
     *   uniqueOpens?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bounces = $values['bounces'] ?? null;
        $this->clicks = $values['clicks'] ?? null;
        $this->gmtOffset = $values['gmtOffset'] ?? null;
        $this->lastClick = $values['lastClick'] ?? null;
        $this->lastOpen = $values['lastOpen'] ?? null;
        $this->opens = $values['opens'] ?? null;
        $this->uniqueClicks = $values['uniqueClicks'] ?? null;
        $this->uniqueOpens = $values['uniqueOpens'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
