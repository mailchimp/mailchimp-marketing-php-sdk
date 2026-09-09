<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * One day's worth of list activity. Doesn't include Automation activity.
 */
class ListActivityListsResponseActivityItem extends JsonSerializableType
{
    /**
     * @var ?array<ListActivityListsResponseActivityItemLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListActivityListsResponseActivityItemLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $day The date for the activity summary.
     */
    #[JsonProperty('day')]
    public ?string $day;

    /**
     * @var ?int $emailsSent The total number of emails sent on the date for the activity summary.
     */
    #[JsonProperty('emails_sent')]
    public ?int $emailsSent;

    /**
     * @var ?int $hardBounce The number of hard bounces.
     */
    #[JsonProperty('hard_bounce')]
    public ?int $hardBounce;

    /**
     * @var ?int $otherAdds The number of subscribers who may have been added outside of the [double opt-in process](https://mailchimp.com/help/about-double-opt-in/), such as imports or API activity.
     */
    #[JsonProperty('other_adds')]
    public ?int $otherAdds;

    /**
     * @var ?int $otherRemoves The number of subscribers who may have been removed outside of unsubscribing or reporting an email as spam (for example, deleted subscribers).
     */
    #[JsonProperty('other_removes')]
    public ?int $otherRemoves;

    /**
     * @var ?int $recipientClicks The number of clicks.
     */
    #[JsonProperty('recipient_clicks')]
    public ?int $recipientClicks;

    /**
     * @var ?int $softBounce The number of soft bounces
     */
    #[JsonProperty('soft_bounce')]
    public ?int $softBounce;

    /**
     * @var ?int $subs The number of subscribes.
     */
    #[JsonProperty('subs')]
    public ?int $subs;

    /**
     * @var ?int $uniqueOpens The number of unique opens.
     */
    #[JsonProperty('unique_opens')]
    public ?int $uniqueOpens;

    /**
     * @var ?int $unsubs The number of unsubscribes.
     */
    #[JsonProperty('unsubs')]
    public ?int $unsubs;

    /**
     * @param array{
     *   links?: ?array<ListActivityListsResponseActivityItemLinksItem>,
     *   day?: ?string,
     *   emailsSent?: ?int,
     *   hardBounce?: ?int,
     *   otherAdds?: ?int,
     *   otherRemoves?: ?int,
     *   recipientClicks?: ?int,
     *   softBounce?: ?int,
     *   subs?: ?int,
     *   uniqueOpens?: ?int,
     *   unsubs?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->day = $values['day'] ?? null;
        $this->emailsSent = $values['emailsSent'] ?? null;
        $this->hardBounce = $values['hardBounce'] ?? null;
        $this->otherAdds = $values['otherAdds'] ?? null;
        $this->otherRemoves = $values['otherRemoves'] ?? null;
        $this->recipientClicks = $values['recipientClicks'] ?? null;
        $this->softBounce = $values['softBounce'] ?? null;
        $this->subs = $values['subs'] ?? null;
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
