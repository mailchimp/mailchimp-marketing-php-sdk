<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use DateTime;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Date;

/**
 * An individual tweet.
 */
class ListEepurlReportsResponseTwitterStatusesItem extends JsonSerializableType
{
    /**
     * @var ?DateTime $datetime A timestamp for the tweet.
     */
    #[JsonProperty('datetime'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $datetime;

    /**
     * @var ?bool $isRetweet A 'true' or 'false' status of whether the tweet is a retweet.
     */
    #[JsonProperty('is_retweet')]
    public ?bool $isRetweet;

    /**
     * @var ?string $screenName The Twitter handle for the author of the tweet.
     */
    #[JsonProperty('screen_name')]
    public ?string $screenName;

    /**
     * @var ?string $status The body of the tweet.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $statusId The individual id for the tweet.
     */
    #[JsonProperty('status_id')]
    public ?string $statusId;

    /**
     * @param array{
     *   datetime?: ?DateTime,
     *   isRetweet?: ?bool,
     *   screenName?: ?string,
     *   status?: ?string,
     *   statusId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->datetime = $values['datetime'] ?? null;
        $this->isRetweet = $values['isRetweet'] ?? null;
        $this->screenName = $values['screenName'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->statusId = $values['statusId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
