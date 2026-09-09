<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * [Default values for campaigns](https://mailchimp.com/help/edit-your-emails-subject-preview-text-from-name-or-from-email-address/) created for this list.
 */
class CreateListsRequestCampaignDefaults extends JsonSerializableType
{
    /**
     * @var string $fromEmail The default from email for campaigns sent to this list.
     */
    #[JsonProperty('from_email')]
    public string $fromEmail;

    /**
     * @var string $fromName The default from name for campaigns sent to this list.
     */
    #[JsonProperty('from_name')]
    public string $fromName;

    /**
     * @var string $language The default language for this lists's forms.
     */
    #[JsonProperty('language')]
    public string $language;

    /**
     * @var string $subject The default subject line for campaigns sent to this list.
     */
    #[JsonProperty('subject')]
    public string $subject;

    /**
     * @param array{
     *   fromEmail: string,
     *   fromName: string,
     *   language: string,
     *   subject: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->fromEmail = $values['fromEmail'];
        $this->fromName = $values['fromName'];
        $this->language = $values['language'];
        $this->subject = $values['subject'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
