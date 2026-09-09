<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Stats for Campaign A.
 */
class CampaignReportAbSplitA extends JsonSerializableType
{
    /**
     * @var ?int $abuseReports Abuse reports for Campaign A.
     */
    #[JsonProperty('abuse_reports')]
    public ?int $abuseReports;

    /**
     * @var ?int $bounces Bounces for Campaign A.
     */
    #[JsonProperty('bounces')]
    public ?int $bounces;

    /**
     * @var ?int $forwards Forwards for Campaign A.
     */
    #[JsonProperty('forwards')]
    public ?int $forwards;

    /**
     * @var ?int $forwardsOpens Opens from forwards for Campaign A.
     */
    #[JsonProperty('forwards_opens')]
    public ?int $forwardsOpens;

    /**
     * @var ?string $lastOpen The last open for Campaign A.
     */
    #[JsonProperty('last_open')]
    public ?string $lastOpen;

    /**
     * @var ?int $opens Opens for Campaign A.
     */
    #[JsonProperty('opens')]
    public ?int $opens;

    /**
     * @var ?int $recipientClicks Recipient Clicks for Campaign A.
     */
    #[JsonProperty('recipient_clicks')]
    public ?int $recipientClicks;

    /**
     * @var ?int $uniqueOpens Unique opens for Campaign A.
     */
    #[JsonProperty('unique_opens')]
    public ?int $uniqueOpens;

    /**
     * @var ?int $unsubs Unsubscribes for Campaign A.
     */
    #[JsonProperty('unsubs')]
    public ?int $unsubs;

    /**
     * @param array{
     *   abuseReports?: ?int,
     *   bounces?: ?int,
     *   forwards?: ?int,
     *   forwardsOpens?: ?int,
     *   lastOpen?: ?string,
     *   opens?: ?int,
     *   recipientClicks?: ?int,
     *   uniqueOpens?: ?int,
     *   unsubs?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->abuseReports = $values['abuseReports'] ?? null;
        $this->bounces = $values['bounces'] ?? null;
        $this->forwards = $values['forwards'] ?? null;
        $this->forwardsOpens = $values['forwardsOpens'] ?? null;
        $this->lastOpen = $values['lastOpen'] ?? null;
        $this->opens = $values['opens'] ?? null;
        $this->recipientClicks = $values['recipientClicks'] ?? null;
        $this->uniqueOpens = $values['uniqueOpens'] ?? null;
        $this->unsubs = $values['unsubs'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
