<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A summary of Twitter activity for a campaign.
 */
class ListEepurlReportsResponseTwitter extends JsonSerializableType
{
    /**
     * @var ?string $firstTweet The day and time of the first recorded tweet with a link to the campaign.
     */
    #[JsonProperty('first_tweet')]
    public ?string $firstTweet;

    /**
     * @var ?string $lastTweet The day and time of the last recorded tweet with a link to the campaign.
     */
    #[JsonProperty('last_tweet')]
    public ?string $lastTweet;

    /**
     * @var ?int $retweets The number of retweets that include a link to the campaign.
     */
    #[JsonProperty('retweets')]
    public ?int $retweets;

    /**
     * @var ?array<ListEepurlReportsResponseTwitterStatusesItem> $statuses A summary of tweets that include a link to the campaign.
     */
    #[JsonProperty('statuses'), ArrayType([ListEepurlReportsResponseTwitterStatusesItem::class])]
    public ?array $statuses;

    /**
     * @var ?int $tweets The number of tweets including a link to the campaign.
     */
    #[JsonProperty('tweets')]
    public ?int $tweets;

    /**
     * @param array{
     *   firstTweet?: ?string,
     *   lastTweet?: ?string,
     *   retweets?: ?int,
     *   statuses?: ?array<ListEepurlReportsResponseTwitterStatusesItem>,
     *   tweets?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->firstTweet = $values['firstTweet'] ?? null;
        $this->lastTweet = $values['lastTweet'] ?? null;
        $this->retweets = $values['retweets'] ?? null;
        $this->statuses = $values['statuses'] ?? null;
        $this->tweets = $values['tweets'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
