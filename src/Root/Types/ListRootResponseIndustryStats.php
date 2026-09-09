<?php

namespace Mailchimp\Root\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The [average campaign statistics](https://mailchimp.com/resources/research/email-marketing-benchmarks/?utm_source=mc-api&utm_medium=docs&utm_campaign=apidocs) for all campaigns in the account's specified industry.
 */
class ListRootResponseIndustryStats extends JsonSerializableType
{
    /**
     * @var ?float $bounceRate The average bounce rate for all campaigns in the account's specified industry.
     */
    #[JsonProperty('bounce_rate')]
    public ?float $bounceRate;

    /**
     * @var ?float $clickRate The average unique click rate for all campaigns in the account's specified industry.
     */
    #[JsonProperty('click_rate')]
    public ?float $clickRate;

    /**
     * @var ?float $openRate The average unique open rate for all campaigns in the account's specified industry.
     */
    #[JsonProperty('open_rate')]
    public ?float $openRate;

    /**
     * @param array{
     *   bounceRate?: ?float,
     *   clickRate?: ?float,
     *   openRate?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bounceRate = $values['bounceRate'] ?? null;
        $this->clickRate = $values['clickRate'] ?? null;
        $this->openRate = $values['openRate'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
