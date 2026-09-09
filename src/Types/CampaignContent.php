<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * The HTML and plain-text content for a campaign.
 */
class CampaignContent extends JsonSerializableType
{
    /**
     * @var ?array<CampaignContentLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([CampaignContentLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $archiveHtml The Archive HTML for the campaign.
     */
    #[JsonProperty('archive_html')]
    public ?string $archiveHtml;

    /**
     * @var ?string $html The raw HTML for the campaign.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?string $plainText The plain-text portion of the campaign. If left unspecified, we'll generate this automatically.
     */
    #[JsonProperty('plain_text')]
    public ?string $plainText;

    /**
     * @var ?array<CampaignContentVariateContentsItem> $variateContents Content options for multivariate campaigns.
     */
    #[JsonProperty('variate_contents'), ArrayType([CampaignContentVariateContentsItem::class])]
    public ?array $variateContents;

    /**
     * @param array{
     *   links?: ?array<CampaignContentLinksItem>,
     *   archiveHtml?: ?string,
     *   html?: ?string,
     *   plainText?: ?string,
     *   variateContents?: ?array<CampaignContentVariateContentsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->archiveHtml = $values['archiveHtml'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->plainText = $values['plainText'] ?? null;
        $this->variateContents = $values['variateContents'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
