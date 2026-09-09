<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * An object describing campaign engagement on Facebook.
 */
class CampaignReportFacebookLikes extends JsonSerializableType
{
    /**
     * @var ?int $facebookLikes The number of Facebook likes for the campaign.
     */
    #[JsonProperty('facebook_likes')]
    public ?int $facebookLikes;

    /**
     * @var ?int $recipientLikes The number of recipients who liked the campaign on Facebook.
     */
    #[JsonProperty('recipient_likes')]
    public ?int $recipientLikes;

    /**
     * @var ?int $uniqueLikes The number of unique likes.
     */
    #[JsonProperty('unique_likes')]
    public ?int $uniqueLikes;

    /**
     * @param array{
     *   facebookLikes?: ?int,
     *   recipientLikes?: ?int,
     *   uniqueLikes?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->facebookLikes = $values['facebookLikes'] ?? null;
        $this->recipientLikes = $values['recipientLikes'] ?? null;
        $this->uniqueLikes = $values['uniqueLikes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
