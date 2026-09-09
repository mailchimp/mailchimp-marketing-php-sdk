<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The url and password for the [VIP report](https://mailchimp.com/help/share-a-campaign-report/).
 */
class CampaignReportShareReport extends JsonSerializableType
{
    /**
     * @var ?string $sharePassword If password protected, the password for the VIP report.
     */
    #[JsonProperty('share_password')]
    public ?string $sharePassword;

    /**
     * @var ?string $shareUrl The URL for the VIP report.
     */
    #[JsonProperty('share_url')]
    public ?string $shareUrl;

    /**
     * @param array{
     *   sharePassword?: ?string,
     *   shareUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sharePassword = $values['sharePassword'] ?? null;
        $this->shareUrl = $values['shareUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
