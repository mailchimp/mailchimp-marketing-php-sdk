<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * General stats about different groups of an A/B Split campaign. Does not return information about Multivariate Campaigns.
 */
class CampaignReportAbSplit extends JsonSerializableType
{
    /**
     * @var ?CampaignReportAbSplitA $a Stats for Campaign A.
     */
    #[JsonProperty('a')]
    public ?CampaignReportAbSplitA $a;

    /**
     * @var ?CampaignReportAbSplitB $b Stats for Campaign B.
     */
    #[JsonProperty('b')]
    public ?CampaignReportAbSplitB $b;

    /**
     * @param array{
     *   a?: ?CampaignReportAbSplitA,
     *   b?: ?CampaignReportAbSplitB,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->a = $values['a'] ?? null;
        $this->b = $values['b'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
