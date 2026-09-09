<?php

namespace Mailchimp\SmsCampaigns\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\SmsCampaigns\Types\UpsertContentSmsCampaignsRequestMediaItem;
use Mailchimp\Core\Types\ArrayType;

class UpsertContentSmsCampaignsRequest extends JsonSerializableType
{
    /**
     * @var string $messageBody The SMS message body.
     */
    #[JsonProperty('message_body')]
    public string $messageBody;

    /**
     * @var ?array<UpsertContentSmsCampaignsRequestMediaItem> $media Attached images or files. Limited to one item. Omitting this field or sending an empty array removes any existing media; to keep the current media while updating other fields, re-send the media array.
     */
    #[JsonProperty('media'), ArrayType([UpsertContentSmsCampaignsRequestMediaItem::class])]
    public ?array $media;

    /**
     * @param array{
     *   messageBody: string,
     *   media?: ?array<UpsertContentSmsCampaignsRequestMediaItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->messageBody = $values['messageBody'];
        $this->media = $values['media'] ?? null;
    }
}
