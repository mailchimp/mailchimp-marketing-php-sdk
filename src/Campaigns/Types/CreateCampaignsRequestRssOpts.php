<?php

namespace Mailchimp\Campaigns\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * [RSS](https://mailchimp.com/help/share-your-blog-posts-with-mailchimp/) options, specific to an RSS campaign.
 */
class CreateCampaignsRequestRssOpts extends JsonSerializableType
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
     * @var value-of<CreateCampaignsRequestRssOptsFrequency> $frequency The frequency of the RSS Campaign.
     */
    #[JsonProperty('frequency')]
    public string $frequency;

    /**
     * @var ?CreateCampaignsRequestRssOptsSchedule $schedule The schedule for sending the RSS Campaign.
     */
    #[JsonProperty('schedule')]
    public ?CreateCampaignsRequestRssOptsSchedule $schedule;

    /**
     * @param array{
     *   feedUrl: string,
     *   frequency: value-of<CreateCampaignsRequestRssOptsFrequency>,
     *   constrainRssImg?: ?bool,
     *   schedule?: ?CreateCampaignsRequestRssOptsSchedule,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->constrainRssImg = $values['constrainRssImg'] ?? null;
        $this->feedUrl = $values['feedUrl'];
        $this->frequency = $values['frequency'];
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
