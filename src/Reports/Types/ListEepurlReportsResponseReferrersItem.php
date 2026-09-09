<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A single instance of a campaign referral.
 */
class ListEepurlReportsResponseReferrersItem extends JsonSerializableType
{
    /**
     * @var ?int $clicks The number of clicks a single referrer generated.
     */
    #[JsonProperty('clicks')]
    public ?int $clicks;

    /**
     * @var ?DateTime $firstClick The timestamp for the first click from this referrer.
     */
    #[JsonProperty('first_click'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $firstClick;

    /**
     * @var ?DateTime $lastClick The timestamp for the last click from this referrer.
     */
    #[JsonProperty('last_click'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastClick;

    /**
     * @var ?string $referrer A referrer (truncated to 100 bytes).
     */
    #[JsonProperty('referrer')]
    public ?string $referrer;

    /**
     * @param array{
     *   clicks?: ?int,
     *   firstClick?: ?DateTime,
     *   lastClick?: ?DateTime,
     *   referrer?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clicks = $values['clicks'] ?? null;
        $this->firstClick = $values['firstClick'] ?? null;
        $this->lastClick = $values['lastClick'] ?? null;
        $this->referrer = $values['referrer'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
