<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * A breakdown of clicks by different groups of an A/B Split campaign. Does not return information about Multivariate Campaigns.
 */
class ClickDetailReportAbSplit extends JsonSerializableType
{
    /**
     * @var ?ClickDetailReportAbSplitA $a Stats for Group A.
     */
    #[JsonProperty('a')]
    public ?ClickDetailReportAbSplitA $a;

    /**
     * @var ?ClickDetailReportAbSplitB $b Stats for Group B.
     */
    #[JsonProperty('b')]
    public ?ClickDetailReportAbSplitB $b;

    /**
     * @param array{
     *   a?: ?ClickDetailReportAbSplitA,
     *   b?: ?ClickDetailReportAbSplitB,
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
