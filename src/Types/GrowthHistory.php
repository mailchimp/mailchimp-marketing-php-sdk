<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * A summary of a specific list's growth activity for a specific month and year.
 */
class GrowthHistory extends JsonSerializableType
{
    /**
     * @var ?array<GrowthHistoryLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([GrowthHistoryLinksItem::class])]
    public ?array $links;

    /**
     * @var ?int $cleaned Newly cleaned (hard-bounced) members on the list for a specific month.
     */
    #[JsonProperty('cleaned')]
    public ?int $cleaned;

    /**
     * @var ?int $deleted Newly deleted members on the list for a specific month.
     */
    #[JsonProperty('deleted')]
    public ?int $deleted;

    /**
     * @var ?int $existing (deprecated)
     */
    #[JsonProperty('existing')]
    public ?int $existing;

    /**
     * @var ?int $imports (deprecated)
     */
    #[JsonProperty('imports')]
    public ?int $imports;

    /**
     * @var ?string $listId The list id for the growth activity report.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?string $month The month that the growth history is describing.
     */
    #[JsonProperty('month')]
    public ?string $month;

    /**
     * @var ?int $optins (deprecated)
     */
    #[JsonProperty('optins')]
    public ?int $optins;

    /**
     * @var ?int $pending Pending members on the list for a specific month.
     */
    #[JsonProperty('pending')]
    public ?int $pending;

    /**
     * @var ?int $reconfirm Newly reconfirmed members on the list for a specific month.
     */
    #[JsonProperty('reconfirm')]
    public ?int $reconfirm;

    /**
     * @var ?int $subscribed Total subscribed members on the list at the end of the month.
     */
    #[JsonProperty('subscribed')]
    public ?int $subscribed;

    /**
     * @var ?int $transactional Subscribers that have been sent transactional emails via Mandrill.
     */
    #[JsonProperty('transactional')]
    public ?int $transactional;

    /**
     * @var ?int $unsubscribed Newly unsubscribed members on the list for a specific month.
     */
    #[JsonProperty('unsubscribed')]
    public ?int $unsubscribed;

    /**
     * @param array{
     *   links?: ?array<GrowthHistoryLinksItem>,
     *   cleaned?: ?int,
     *   deleted?: ?int,
     *   existing?: ?int,
     *   imports?: ?int,
     *   listId?: ?string,
     *   month?: ?string,
     *   optins?: ?int,
     *   pending?: ?int,
     *   reconfirm?: ?int,
     *   subscribed?: ?int,
     *   transactional?: ?int,
     *   unsubscribed?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->cleaned = $values['cleaned'] ?? null;
        $this->deleted = $values['deleted'] ?? null;
        $this->existing = $values['existing'] ?? null;
        $this->imports = $values['imports'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->month = $values['month'] ?? null;
        $this->optins = $values['optins'] ?? null;
        $this->pending = $values['pending'] ?? null;
        $this->reconfirm = $values['reconfirm'] ?? null;
        $this->subscribed = $values['subscribed'] ?? null;
        $this->transactional = $values['transactional'] ?? null;
        $this->unsubscribed = $values['unsubscribed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
