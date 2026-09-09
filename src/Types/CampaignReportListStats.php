<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The average campaign statistics for your list. This won't be present if we haven't calculated it yet for this list.
 */
class CampaignReportListStats extends JsonSerializableType
{
    /**
     * @var ?float $clickRate The average click rate (a percentage represented as a number between 0 and 100) per campaign for the list.
     */
    #[JsonProperty('click_rate')]
    public ?float $clickRate;

    /**
     * @var ?float $openRate The average unique open rate (a percentage represented as a number between 0 and 100) per campaign for the list.
     */
    #[JsonProperty('open_rate')]
    public ?float $openRate;

    /**
     * @var ?float $proxyExcludedOpenRate The average unique open rate (a percentage represented as a number between 0 and 100) per campaign for the list, excluding opens from email clients that use proxies.
     */
    #[JsonProperty('proxy_excluded_open_rate')]
    public ?float $proxyExcludedOpenRate;

    /**
     * @var ?float $subRate The average number of subscriptions per month for the list.
     */
    #[JsonProperty('sub_rate')]
    public ?float $subRate;

    /**
     * @var ?float $unsubRate The average number of unsubscriptions per month for the list.
     */
    #[JsonProperty('unsub_rate')]
    public ?float $unsubRate;

    /**
     * @param array{
     *   clickRate?: ?float,
     *   openRate?: ?float,
     *   proxyExcludedOpenRate?: ?float,
     *   subRate?: ?float,
     *   unsubRate?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clickRate = $values['clickRate'] ?? null;
        $this->openRate = $values['openRate'] ?? null;
        $this->proxyExcludedOpenRate = $values['proxyExcludedOpenRate'] ?? null;
        $this->subRate = $values['subRate'] ?? null;
        $this->unsubRate = $values['unsubRate'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
