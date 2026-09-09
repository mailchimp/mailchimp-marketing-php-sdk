<?php

namespace Mailchimp\Campaigns\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class UpdateFeedbackCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?int $blockId The block id for the editable block that the feedback addresses.
     */
    #[JsonProperty('block_id')]
    public ?int $blockId;

    /**
     * @var ?bool $isComplete The status of feedback.
     */
    #[JsonProperty('is_complete')]
    public ?bool $isComplete;

    /**
     * @var ?string $message The content of the feedback.
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @param array{
     *   blockId?: ?int,
     *   isComplete?: ?bool,
     *   message?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blockId = $values['blockId'] ?? null;
        $this->isComplete = $values['isComplete'] ?? null;
        $this->message = $values['message'] ?? null;
    }
}
