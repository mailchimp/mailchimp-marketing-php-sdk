<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The settings for the Automation workflow.
 */
class AutomationWorkflowSettings extends JsonSerializableType
{
    /**
     * @var ?bool $authenticate Whether Mailchimp [authenticated](https://mailchimp.com/help/about-email-authentication/) the Automation. Defaults to `true`.
     */
    #[JsonProperty('authenticate')]
    public ?bool $authenticate;

    /**
     * @var ?bool $autoFooter Whether to automatically append Mailchimp's [default footer](https://mailchimp.com/help/about-campaign-footers/) to the Automation.
     */
    #[JsonProperty('auto_footer')]
    public ?bool $autoFooter;

    /**
     * @var ?string $fromName The 'from' name for the Automation (not an email address).
     */
    #[JsonProperty('from_name')]
    public ?string $fromName;

    /**
     * @var ?bool $inlineCss Whether to automatically inline the CSS included with the Automation content.
     */
    #[JsonProperty('inline_css')]
    public ?bool $inlineCss;

    /**
     * @var ?string $replyTo The reply-to email address for the Automation.
     */
    #[JsonProperty('reply_to')]
    public ?string $replyTo;

    /**
     * @var ?string $title The title of the Automation.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $toName The Automation's custom 'To' name, typically the first name [audience field](https://mailchimp.com/help/getting-started-with-merge-tags/).
     */
    #[JsonProperty('to_name')]
    public ?string $toName;

    /**
     * @var ?bool $useConversation Whether to use Mailchimp Conversation feature to manage replies
     */
    #[JsonProperty('use_conversation')]
    public ?bool $useConversation;

    /**
     * @param array{
     *   authenticate?: ?bool,
     *   autoFooter?: ?bool,
     *   fromName?: ?string,
     *   inlineCss?: ?bool,
     *   replyTo?: ?string,
     *   title?: ?string,
     *   toName?: ?string,
     *   useConversation?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->authenticate = $values['authenticate'] ?? null;
        $this->autoFooter = $values['autoFooter'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->inlineCss = $values['inlineCss'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->toName = $values['toName'] ?? null;
        $this->useConversation = $values['useConversation'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
