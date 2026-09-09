<?php

namespace Mailchimp\ActivityFeed\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A Chimp Chatter message
 */
class ListChimpChatterActivityFeedResponseChimpChatterItem extends JsonSerializableType
{
    /**
     * @var ?string $campaignId If it exists, campaign ID for the associated campaign
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?string $listId If it exists, list ID for the associated list
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?value-of<ListChimpChatterActivityFeedResponseChimpChatterItemType> $type The type of activity
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?DateTime $updateTime The date and time this activity was updated.
     */
    #[JsonProperty('update_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updateTime;

    /**
     * @var ?string $url URL to a report that includes this activity
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   campaignId?: ?string,
     *   listId?: ?string,
     *   message?: ?string,
     *   title?: ?string,
     *   type?: ?value-of<ListChimpChatterActivityFeedResponseChimpChatterItemType>,
     *   updateTime?: ?DateTime,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->campaignId = $values['campaignId'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->updateTime = $values['updateTime'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
