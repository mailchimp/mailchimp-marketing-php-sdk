<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use DateTime;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Date;

/**
 * An object describing the open activity for the campaign.
 */
class CampaignReportOpens extends JsonSerializableType
{
    /**
     * @var ?DateTime $lastOpen The date and time of the last recorded open in ISO 8601 format.
     */
    #[JsonProperty('last_open'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastOpen;

    /**
     * @var ?float $openRate The number of unique opens for a campaign divided by the total number of successful deliveries.
     */
    #[JsonProperty('open_rate')]
    public ?float $openRate;

    /**
     * @var ?int $opensTotal The total number of opens for a campaign.
     */
    #[JsonProperty('opens_total')]
    public ?int $opensTotal;

    /**
     * @var ?float $proxyExcludedOpenRate The average unique open rate for a campaign, excluding opens from email clients that use proxies.
     */
    #[JsonProperty('proxy_excluded_open_rate')]
    public ?float $proxyExcludedOpenRate;

    /**
     * @var ?int $proxyExcludedOpens The total number of opens for a campaign, excluding opens from email clients that use proxies.
     */
    #[JsonProperty('proxy_excluded_opens')]
    public ?int $proxyExcludedOpens;

    /**
     * @var ?int $proxyExcludedUniqueOpens The total number of unique opens for a campaign, excluding opens from email clients that use proxies.
     */
    #[JsonProperty('proxy_excluded_unique_opens')]
    public ?int $proxyExcludedUniqueOpens;

    /**
     * @var ?int $uniqueOpens The total number of unique opens for a campaign.
     */
    #[JsonProperty('unique_opens')]
    public ?int $uniqueOpens;

    /**
     * @param array{
     *   lastOpen?: ?DateTime,
     *   openRate?: ?float,
     *   opensTotal?: ?int,
     *   proxyExcludedOpenRate?: ?float,
     *   proxyExcludedOpens?: ?int,
     *   proxyExcludedUniqueOpens?: ?int,
     *   uniqueOpens?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->lastOpen = $values['lastOpen'] ?? null;
        $this->openRate = $values['openRate'] ?? null;
        $this->opensTotal = $values['opensTotal'] ?? null;
        $this->proxyExcludedOpenRate = $values['proxyExcludedOpenRate'] ?? null;
        $this->proxyExcludedOpens = $values['proxyExcludedOpens'] ?? null;
        $this->proxyExcludedUniqueOpens = $values['proxyExcludedUniqueOpens'] ?? null;
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
