<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Settings for the campaign including the email subject, from name, and from email address.
 */
class AutomationWorkflowEmailSettings extends JsonSerializableType
{
    /**
     * @var ?bool $authenticate Whether Mailchimp [authenticated](https://mailchimp.com/help/about-email-authentication/) the campaign. Defaults to `true`.
     */
    #[JsonProperty('authenticate')]
    public ?bool $authenticate;

    /**
     * @var ?array<string> $autoFbPost An array of [Facebook](https://mailchimp.com/help/connect-or-disconnect-the-facebook-integration/) page ids to auto-post to.
     */
    #[JsonProperty('auto_fb_post'), ArrayType(['string'])]
    public ?array $autoFbPost;

    /**
     * @var ?bool $autoFooter Automatically append Mailchimp's [default footer](https://mailchimp.com/help/about-campaign-footers/) to the campaign.
     */
    #[JsonProperty('auto_footer')]
    public ?bool $autoFooter;

    /**
     * @var ?bool $autoTweet Automatically tweet a link to the [campaign archive](https://mailchimp.com/help/about-email-campaign-archives-and-pages/) page when the campaign is sent.
     */
    #[JsonProperty('auto_tweet')]
    public ?bool $autoTweet;

    /**
     * @var ?bool $dragAndDrop Whether the campaign uses the drag-and-drop editor.
     */
    #[JsonProperty('drag_and_drop')]
    public ?bool $dragAndDrop;

    /**
     * @var ?bool $fbComments Allows Facebook comments on the campaign (also force-enables the Campaign Archive toolbar). Defaults to `true`.
     */
    #[JsonProperty('fb_comments')]
    public ?bool $fbComments;

    /**
     * @var ?string $fromName The 'from' name on the campaign (not an email address).
     */
    #[JsonProperty('from_name')]
    public ?string $fromName;

    /**
     * @var ?bool $inlineCss Automatically inline the CSS included with the campaign content.
     */
    #[JsonProperty('inline_css')]
    public ?bool $inlineCss;

    /**
     * @var ?string $previewText The preview text for the campaign.
     */
    #[JsonProperty('preview_text')]
    public ?string $previewText;

    /**
     * @var ?string $replyTo The reply-to email address for the campaign.
     */
    #[JsonProperty('reply_to')]
    public ?string $replyTo;

    /**
     * @var ?string $subjectLine The subject line for the campaign.
     */
    #[JsonProperty('subject_line')]
    public ?string $subjectLine;

    /**
     * @var ?int $templateId The id for the template used in this campaign.
     */
    #[JsonProperty('template_id')]
    public ?int $templateId;

    /**
     * @var ?string $title The title of the campaign.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   authenticate?: ?bool,
     *   autoFbPost?: ?array<string>,
     *   autoFooter?: ?bool,
     *   autoTweet?: ?bool,
     *   dragAndDrop?: ?bool,
     *   fbComments?: ?bool,
     *   fromName?: ?string,
     *   inlineCss?: ?bool,
     *   previewText?: ?string,
     *   replyTo?: ?string,
     *   subjectLine?: ?string,
     *   templateId?: ?int,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->authenticate = $values['authenticate'] ?? null;
        $this->autoFbPost = $values['autoFbPost'] ?? null;
        $this->autoFooter = $values['autoFooter'] ?? null;
        $this->autoTweet = $values['autoTweet'] ?? null;
        $this->dragAndDrop = $values['dragAndDrop'] ?? null;
        $this->fbComments = $values['fbComments'] ?? null;
        $this->fromName = $values['fromName'] ?? null;
        $this->inlineCss = $values['inlineCss'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->subjectLine = $values['subjectLine'] ?? null;
        $this->templateId = $values['templateId'] ?? null;
        $this->title = $values['title'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
