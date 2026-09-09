<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Stats for the list. Many of these are cached for at least five minutes.
 */
class SubscriberListStats extends JsonSerializableType
{
    /**
     * @var ?float $avgSubRate The average number of subscriptions per month for the list (not returned if we haven't calculated it yet).
     */
    #[JsonProperty('avg_sub_rate')]
    public ?float $avgSubRate;

    /**
     * @var ?float $avgUnsubRate The average number of unsubscriptions per month for the list (not returned if we haven't calculated it yet).
     */
    #[JsonProperty('avg_unsub_rate')]
    public ?float $avgUnsubRate;

    /**
     * @var ?int $campaignCount The number of campaigns in any status that use this list.
     */
    #[JsonProperty('campaign_count')]
    public ?int $campaignCount;

    /**
     * @var ?DateTime $campaignLastSent The date and time the last campaign was sent to this list in ISO 8601 format. This is updated when a campaign is sent to 10 or more recipients.
     */
    #[JsonProperty('campaign_last_sent'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $campaignLastSent;

    /**
     * @var ?int $cleanedCount The number of members cleaned from the list.
     */
    #[JsonProperty('cleaned_count')]
    public ?int $cleanedCount;

    /**
     * @var ?int $cleanedCountSinceSend The number of members cleaned from the list since the last campaign was sent.
     */
    #[JsonProperty('cleaned_count_since_send')]
    public ?int $cleanedCountSinceSend;

    /**
     * @var ?float $clickRate The average click rate (a percentage represented as a number between 0 and 100) per campaign for the list (not returned if we haven't calculated it yet).
     */
    #[JsonProperty('click_rate')]
    public ?float $clickRate;

    /**
     * @var ?DateTime $lastSubDate The date and time of the last time someone subscribed to this list in ISO 8601 format.
     */
    #[JsonProperty('last_sub_date'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSubDate;

    /**
     * @var ?DateTime $lastUnsubDate The date and time of the last time someone unsubscribed from this list in ISO 8601 format.
     */
    #[JsonProperty('last_unsub_date'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastUnsubDate;

    /**
     * @var ?int $memberCount The number of active members in the list.
     */
    #[JsonProperty('member_count')]
    public ?int $memberCount;

    /**
     * @var ?int $memberCountSinceSend The number of active members in the list since the last campaign was sent.
     */
    #[JsonProperty('member_count_since_send')]
    public ?int $memberCountSinceSend;

    /**
     * @var ?int $mergeFieldCount The number of merge fields ([audience field](https://mailchimp.com/help/getting-started-with-merge-tags/)) for this list (doesn't include EMAIL).
     */
    #[JsonProperty('merge_field_count')]
    public ?int $mergeFieldCount;

    /**
     * @var ?float $openRate The average open rate (a percentage represented as a number between 0 and 100) per campaign for the list (not returned if we haven't calculated it yet).
     */
    #[JsonProperty('open_rate')]
    public ?float $openRate;

    /**
     * @var ?float $targetSubRate The target number of subscriptions per month for the list to keep it growing (not returned if we haven't calculated it yet).
     */
    #[JsonProperty('target_sub_rate')]
    public ?float $targetSubRate;

    /**
     * @var ?int $totalContacts An approximate count of subscribed, unsubscribed, and transactional contacts in the list. Does not include cleaned, archived, pending, or contacts that need to be reconfirmed. Requires the (deprecated) include_total_contacts query parameter to be included; for a complete audience contact count, use the /audiences endpoint instead.
     */
    #[JsonProperty('total_contacts')]
    public ?int $totalContacts;

    /**
     * @var ?int $unsubscribeCount The number of members who have unsubscribed from the list.
     */
    #[JsonProperty('unsubscribe_count')]
    public ?int $unsubscribeCount;

    /**
     * @var ?int $unsubscribeCountSinceSend The number of members who have unsubscribed since the last campaign was sent.
     */
    #[JsonProperty('unsubscribe_count_since_send')]
    public ?int $unsubscribeCountSinceSend;

    /**
     * @param array{
     *   avgSubRate?: ?float,
     *   avgUnsubRate?: ?float,
     *   campaignCount?: ?int,
     *   campaignLastSent?: ?DateTime,
     *   cleanedCount?: ?int,
     *   cleanedCountSinceSend?: ?int,
     *   clickRate?: ?float,
     *   lastSubDate?: ?DateTime,
     *   lastUnsubDate?: ?DateTime,
     *   memberCount?: ?int,
     *   memberCountSinceSend?: ?int,
     *   mergeFieldCount?: ?int,
     *   openRate?: ?float,
     *   targetSubRate?: ?float,
     *   totalContacts?: ?int,
     *   unsubscribeCount?: ?int,
     *   unsubscribeCountSinceSend?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->avgSubRate = $values['avgSubRate'] ?? null;
        $this->avgUnsubRate = $values['avgUnsubRate'] ?? null;
        $this->campaignCount = $values['campaignCount'] ?? null;
        $this->campaignLastSent = $values['campaignLastSent'] ?? null;
        $this->cleanedCount = $values['cleanedCount'] ?? null;
        $this->cleanedCountSinceSend = $values['cleanedCountSinceSend'] ?? null;
        $this->clickRate = $values['clickRate'] ?? null;
        $this->lastSubDate = $values['lastSubDate'] ?? null;
        $this->lastUnsubDate = $values['lastUnsubDate'] ?? null;
        $this->memberCount = $values['memberCount'] ?? null;
        $this->memberCountSinceSend = $values['memberCountSinceSend'] ?? null;
        $this->mergeFieldCount = $values['mergeFieldCount'] ?? null;
        $this->openRate = $values['openRate'] ?? null;
        $this->targetSubRate = $values['targetSubRate'] ?? null;
        $this->totalContacts = $values['totalContacts'] ?? null;
        $this->unsubscribeCount = $values['unsubscribeCount'] ?? null;
        $this->unsubscribeCountSinceSend = $values['unsubscribeCountSinceSend'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
