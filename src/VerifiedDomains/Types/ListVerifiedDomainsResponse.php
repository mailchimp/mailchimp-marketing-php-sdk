<?php

namespace Mailchimp\VerifiedDomains\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * The verified domains currently on the account.
 */
class ListVerifiedDomainsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListVerifiedDomainsResponseDomainsItem> $domains The domains on the account
     */
    #[JsonProperty('domains'), ArrayType([ListVerifiedDomainsResponseDomainsItem::class])]
    public ?array $domains;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   domains?: ?array<ListVerifiedDomainsResponseDomainsItem>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->domains = $values['domains'] ?? null;
        $this->totalItems = $values['totalItems'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
