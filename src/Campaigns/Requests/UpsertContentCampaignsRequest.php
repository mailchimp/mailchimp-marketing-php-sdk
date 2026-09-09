<?php

namespace Mailchimp\Campaigns\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Types\CampaignContent;

class UpsertContentCampaignsRequest extends JsonSerializableType
{
    /**
     * @var CampaignContent $body
     */
    public CampaignContent $body;

    /**
     * @param array{
     *   body: CampaignContent,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
