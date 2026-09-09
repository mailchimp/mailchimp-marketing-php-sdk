<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * An object describing the forwards and forward activity for the campaign.
 */
class CampaignReportForwards extends JsonSerializableType
{
    /**
     * @var ?int $forwardsCount How many times the campaign has been forwarded.
     */
    #[JsonProperty('forwards_count')]
    public ?int $forwardsCount;

    /**
     * @var ?int $forwardsOpens How many times the forwarded campaign has been opened.
     */
    #[JsonProperty('forwards_opens')]
    public ?int $forwardsOpens;

    /**
     * @param array{
     *   forwardsCount?: ?int,
     *   forwardsOpens?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->forwardsCount = $values['forwardsCount'] ?? null;
        $this->forwardsOpens = $values['forwardsOpens'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
