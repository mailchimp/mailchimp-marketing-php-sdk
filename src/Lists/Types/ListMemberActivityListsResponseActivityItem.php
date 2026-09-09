<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Member activity events.
 */
class ListMemberActivityListsResponseActivityItem extends JsonSerializableType
{
    /**
     * @var ?string $action The type of action recorded for the subscriber.
     */
    #[JsonProperty('action')]
    public ?string $action;

    /**
     * @var ?string $campaignId The web-based ID for the campaign.
     */
    #[JsonProperty('campaign_id')]
    public ?string $campaignId;

    /**
     * @var ?string $parentCampaign The ID of the parent campaign.
     */
    #[JsonProperty('parent_campaign')]
    public ?string $parentCampaign;

    /**
     * @var ?DateTime $timestamp The date and time recorded for the action.
     */
    #[JsonProperty('timestamp'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $timestamp;

    /**
     * @var ?string $title If set, the campaign's title.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $type The type of campaign that was sent.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?string $url For clicks, the URL the subscriber clicked on.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   action?: ?string,
     *   campaignId?: ?string,
     *   parentCampaign?: ?string,
     *   timestamp?: ?DateTime,
     *   title?: ?string,
     *   type?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->action = $values['action'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->parentCampaign = $values['parentCampaign'] ?? null;
        $this->timestamp = $values['timestamp'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->type = $values['type'] ?? null;
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
