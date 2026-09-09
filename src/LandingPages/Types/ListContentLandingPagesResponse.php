<?php

namespace Mailchimp\LandingPages\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * The HTML content for a landing page.
 */
class ListContentLandingPagesResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListContentLandingPagesResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListContentLandingPagesResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $html The raw HTML for the landing page.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?string $json The JSON Structure for the landing page
     */
    #[JsonProperty('json')]
    public ?string $json;

    /**
     * @param array{
     *   links?: ?array<ListContentLandingPagesResponseLinksItem>,
     *   html?: ?string,
     *   json?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->json = $values['json'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
