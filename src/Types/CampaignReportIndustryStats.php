<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The average campaign statistics for your industry.
 */
class CampaignReportIndustryStats extends JsonSerializableType
{
    /**
     * @var ?float $abuseRate The industry abuse rate.
     */
    #[JsonProperty('abuse_rate')]
    public ?float $abuseRate;

    /**
     * @var ?float $bounceRate The industry bounce rate.
     */
    #[JsonProperty('bounce_rate')]
    public ?float $bounceRate;

    /**
     * @var ?float $clickRate The industry click rate.
     */
    #[JsonProperty('click_rate')]
    public ?float $clickRate;

    /**
     * @var ?float $openRate The industry open rate.
     */
    #[JsonProperty('open_rate')]
    public ?float $openRate;

    /**
     * @var ?string $type The type of business industry associated with your account. For example: retail, education, etc.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?float $unopenRate The industry unopened rate.
     */
    #[JsonProperty('unopen_rate')]
    public ?float $unopenRate;

    /**
     * @var ?float $unsubRate The industry unsubscribe rate.
     */
    #[JsonProperty('unsub_rate')]
    public ?float $unsubRate;

    /**
     * @param array{
     *   abuseRate?: ?float,
     *   bounceRate?: ?float,
     *   clickRate?: ?float,
     *   openRate?: ?float,
     *   type?: ?string,
     *   unopenRate?: ?float,
     *   unsubRate?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->abuseRate = $values['abuseRate'] ?? null;
        $this->bounceRate = $values['bounceRate'] ?? null;
        $this->clickRate = $values['clickRate'] ?? null;
        $this->openRate = $values['openRate'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->unopenRate = $values['unopenRate'] ?? null;
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
