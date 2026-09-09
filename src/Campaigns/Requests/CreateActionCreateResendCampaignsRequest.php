<?php

namespace Mailchimp\Campaigns\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Campaigns\Types\CreateActionCreateResendCampaignsRequestShortcutType;
use Mailchimp\Core\Json\JsonProperty;

class CreateActionCreateResendCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<CreateActionCreateResendCampaignsRequestShortcutType> $shortcutType Which campaign resend shortcut to use. Default is `to_non_openers`.
     */
    #[JsonProperty('shortcut_type')]
    public ?string $shortcutType;

    /**
     * @param array{
     *   shortcutType?: ?value-of<CreateActionCreateResendCampaignsRequestShortcutType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->shortcutType = $values['shortcutType'] ?? null;
    }
}
