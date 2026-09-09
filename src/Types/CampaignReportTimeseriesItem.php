<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

class CampaignReportTimeseriesItem extends JsonSerializableType
{
    /**
     * @var ?int $emailsSent The number of emails sent in the timeseries.
     */
    #[JsonProperty('emails_sent')]
    public ?int $emailsSent;

    /**
     * @var ?int $proxyExcludedUniqueOpens The number of unique opens in the timeseries, excluding opens from email clients that use proxies.
     */
    #[JsonProperty('proxy_excluded_unique_opens')]
    public ?int $proxyExcludedUniqueOpens;

    /**
     * @var ?int $recipientsClicks The number of clicks in the timeseries.
     */
    #[JsonProperty('recipients_clicks')]
    public ?int $recipientsClicks;

    /**
     * @var ?DateTime $timestamp The date and time for the series in ISO 8601 format.
     */
    #[JsonProperty('timestamp'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $timestamp;

    /**
     * @var ?int $uniqueOpens The number of unique opens in the timeseries.
     */
    #[JsonProperty('unique_opens')]
    public ?int $uniqueOpens;

    /**
     * @param array{
     *   emailsSent?: ?int,
     *   proxyExcludedUniqueOpens?: ?int,
     *   recipientsClicks?: ?int,
     *   timestamp?: ?DateTime,
     *   uniqueOpens?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailsSent = $values['emailsSent'] ?? null;
        $this->proxyExcludedUniqueOpens = $values['proxyExcludedUniqueOpens'] ?? null;
        $this->recipientsClicks = $values['recipientsClicks'] ?? null;
        $this->timestamp = $values['timestamp'] ?? null;
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
