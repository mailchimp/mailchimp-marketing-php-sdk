<?php

namespace Mailchimp\SearchCampaigns\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Types\Campaigns;
use Mailchimp\Core\Json\JsonProperty;

class ListSearchCampaignsResponseResultsItem extends JsonSerializableType
{
    /**
     * @var ?Campaigns $campaign
     */
    #[JsonProperty('campaign')]
    public ?Campaigns $campaign;

    /**
     * @var ?string $snippet
     */
    #[JsonProperty('snippet')]
    public ?string $snippet;

    /**
     * @param array{
     *   campaign?: ?Campaigns,
     *   snippet?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaign = $values['campaign'] ?? null;
        $this->snippet = $values['snippet'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
