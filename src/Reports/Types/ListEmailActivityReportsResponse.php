<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Types\EmailActivity;

/**
 * A list of member's subscriber activity in a specific campaign.
 */
class ListEmailActivityReportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListEmailActivityReportsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListEmailActivityReportsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $campaignId The unique id for the sent campaign.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?array<EmailActivity> $emails An array of members that were sent the campaign.
     */
    #[JsonProperty('emails'), ArrayType([EmailActivity::class])]
    public ?array $emails;

    /**
     * @var ?int $totalItems The total number of items matching the query regardless of pagination.
     */
    #[JsonProperty('total_items')]
    public ?int $totalItems;

    /**
     * @param array{
     *   links?: ?array<ListEmailActivityReportsResponseLinksItem>,
     *   campaignId?: ?string,
     *   emails?: ?array<EmailActivity>,
     *   totalItems?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->emails = $values['emails'] ?? null;
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
