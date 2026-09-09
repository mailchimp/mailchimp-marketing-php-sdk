<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Types\AddWebhook;

class UpdateWebhookListsRequest extends JsonSerializableType
{
    /**
     * @var AddWebhook $body
     */
    public AddWebhook $body;

    /**
     * @param array{
     *   body: AddWebhook,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
