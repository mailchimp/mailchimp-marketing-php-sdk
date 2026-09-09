<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Stats for Campaign B.
 */
class CampaignReportAbSplitB extends JsonSerializableType
{
    /**
     * @var ?int $abuseReports Abuse reports for Campaign B.
     */
    #[JsonProperty('abuse_reports')]
    public ?int $abuseReports;

    /**
     * @var ?int $bounces Bounces for Campaign B.
     */
    #[JsonProperty('bounces')]
    public ?int $bounces;

    /**
     * @var ?int $forwards Forwards for Campaign B.
     */
    #[JsonProperty('forwards')]
    public ?int $forwards;

    /**
     * @var ?int $forwardsOpens Opens for forwards from Campaign B.
     */
    #[JsonProperty('forwards_opens')]
    public ?int $forwardsOpens;

    /**
     * @var ?string $lastOpen The last open for Campaign B.
     */
    #[JsonProperty('last_open')]
    public ?string $lastOpen;

    /**
     * @var ?int $opens Opens for Campaign B.
     */
    #[JsonProperty('opens')]
    public ?int $opens;

    /**
     * @var ?int $recipientClicks Recipients clicks for Campaign B.
     */
    #[JsonProperty('recipient_clicks')]
    public ?int $recipientClicks;

    /**
     * @var ?int $uniqueOpens Unique opens for Campaign B.
     */
    #[JsonProperty('unique_opens')]
    public ?int $uniqueOpens;

    /**
     * @var ?int $unsubs Unsubscribes for Campaign B.
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
