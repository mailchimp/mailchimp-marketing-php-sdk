<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * A single email domain's performance
 */
class ListDomainPerformanceReportsResponseDomainsItem extends JsonSerializableType
{
    /**
     * @var ?int $bounces The number of bounces at a domain.
     */
    #[JsonProperty('bounces')]
    public ?int $bounces;

    /**
     * @var ?float $bouncesPct The percentage of total bounces from this domain.
     */
    #[JsonProperty('bounces_pct')]
    public ?float $bouncesPct;

    /**
     * @var ?int $clicks The number of clicks for a domain.
     */
    #[JsonProperty('clicks')]
    public ?int $clicks;

    /**
     * @var ?float $clicksPct The percentage of total clicks from this domain.
     */
    #[JsonProperty('clicks_pct')]
    public ?float $clicksPct;

    /**
     * @var ?int $delivered The number of successful deliveries for a domain.
     */
    #[JsonProperty('delivered')]
    public ?int $delivered;

    /**
     * @var ?string $domain The name of the domain (gmail.com, hotmail.com, yahoo.com).
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?float $emailsPct The percentage of total emails that went to this domain.
     */
    #[JsonProperty('emails_pct')]
    public ?float $emailsPct;

    /**
     * @var ?int $emailsSent The number of emails sent to that specific domain.
     */
    #[JsonProperty('emails_sent')]
    public ?int $emailsSent;

    /**
     * @var ?int $opens The number of opens for a domain.
     */
    #[JsonProperty('opens')]
    public ?int $opens;

    /**
     * @var ?float $opensPct The percentage of total opens from this domain.
     */
    #[JsonProperty('opens_pct')]
    public ?float $opensPct;

    /**
     * @var ?int $unsubs The total number of unsubscribes for a domain.
     */
    #[JsonProperty('unsubs')]
    public ?int $unsubs;

    /**
     * @var ?float $unsubsPct The percentage of total unsubscribes from this domain.
     */
    #[JsonProperty('unsubs_pct')]
    public ?float $unsubsPct;

    /**
     * @param array{
     *   bounces?: ?int,
     *   bouncesPct?: ?float,
     *   clicks?: ?int,
     *   clicksPct?: ?float,
     *   delivered?: ?int,
     *   domain?: ?string,
     *   emailsPct?: ?float,
     *   emailsSent?: ?int,
     *   opens?: ?int,
     *   opensPct?: ?float,
     *   unsubs?: ?int,
     *   unsubsPct?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bounces = $values['bounces'] ?? null;
        $this->bouncesPct = $values['bouncesPct'] ?? null;
        $this->clicks = $values['clicks'] ?? null;
        $this->clicksPct = $values['clicksPct'] ?? null;
        $this->delivered = $values['delivered'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->emailsPct = $values['emailsPct'] ?? null;
        $this->emailsSent = $values['emailsSent'] ?? null;
        $this->opens = $values['opens'] ?? null;
        $this->opensPct = $values['opensPct'] ?? null;
        $this->unsubs = $values['unsubs'] ?? null;
        $this->unsubsPct = $values['unsubsPct'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
