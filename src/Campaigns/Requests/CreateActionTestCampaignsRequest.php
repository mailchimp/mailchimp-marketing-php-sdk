<?php

namespace Mailchimp\Campaigns\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Campaigns\Types\CreateActionTestCampaignsRequestSendType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

class CreateActionTestCampaignsRequest extends JsonSerializableType
{
    /**
     * @var value-of<CreateActionTestCampaignsRequestSendType> $sendType Choose the type of test email to send.
     */
    #[JsonProperty('send_type')]
    public string $sendType;

    /**
     * @var array<string> $testEmails An array of email addresses to send the test email to.
     */
    #[JsonProperty('test_emails'), ArrayType(['string'])]
    public array $testEmails;

    /**
     * @param array{
     *   sendType: value-of<CreateActionTestCampaignsRequestSendType>,
     *   testEmails: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sendType = $values['sendType'];
        $this->testEmails = $values['testEmails'];
    }
}
