<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * [RSS](https://mailchimp.com/help/share-your-blog-posts-with-mailchimp/) options for a campaign.
 */
class CampaignRssOpts extends JsonSerializableType
{
    /**
     * @var ?bool $constrainRssImg Whether to add CSS to images in the RSS feed to constrain their width in campaigns.
     */
    #[JsonProperty('constrain_rss_img')]
    public ?bool $constrainRssImg;

    /**
     * @var string $feedUrl The URL for the RSS feed.
     */
    #[JsonProperty('feed_url')]
    public string $feedUrl;

    /**
     * @var value-of<CampaignRssOptsFrequency> $frequency The frequency of the RSS Campaign.
     */
    #[JsonProperty('frequency')]
    public string $frequency;

    /**
     * @var ?DateTime $lastSent The date the campaign was last sent.
     */
    #[JsonProperty('last_sent'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSent;

    /**
     * @var ?CampaignRssOptsSchedule $schedule The schedule for sending the RSS Campaign.
     */
    #[JsonProperty('schedule')]
    public ?CampaignRssOptsSchedule $schedule;

    /**
     * @param array{
     *   feedUrl: string,
     *   frequency: value-of<CampaignRssOptsFrequency>,
     *   constrainRssImg?: ?bool,
     *   lastSent?: ?DateTime,
     *   schedule?: ?CampaignRssOptsSchedule,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->constrainRssImg = $values['constrainRssImg'] ?? null;
        $this->feedUrl = $values['feedUrl'];
        $this->frequency = $values['frequency'];
        $this->lastSent = $values['lastSent'] ?? null;
        $this->schedule = $values['schedule'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
