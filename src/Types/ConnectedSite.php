<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Information about a specific connected site.
 */
class ConnectedSite extends JsonSerializableType
{
    /**
     * @var ?array<ConnectedSiteLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ConnectedSiteLinksItem::class])]
    public ?array $links;

    /**
     * @var ?DateTime $createdAt The date and time the connected site was created in ISO 8601 format.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $domain The connected site domain.
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?string $foreignId The unique identifier for the site.
     */
    #[JsonProperty('foreign_id')]
    public ?string $foreignId;

    /**
     * @var ?string $platform The platform of the connected site.
     */
    #[JsonProperty('platform')]
    public ?string $platform;

    /**
     * @var ?ConnectedSiteSiteScript $siteScript The script used to connect your site with Mailchimp.
     */
    #[JsonProperty('site_script')]
    public ?ConnectedSiteSiteScript $siteScript;

    /**
     * @var ?string $storeId The unique identifier for the ecommerce store that's associated with the connected site (if any). The store_id for a specific connected site can't change.
     */
    #[JsonProperty('store_id')]
    public ?string $storeId;

    /**
     * @var ?DateTime $updatedAt The date and time the connected site was last updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   links?: ?array<ConnectedSiteLinksItem>,
     *   createdAt?: ?DateTime,
     *   domain?: ?string,
     *   foreignId?: ?string,
     *   platform?: ?string,
     *   siteScript?: ?ConnectedSiteSiteScript,
     *   storeId?: ?string,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->foreignId = $values['foreignId'] ?? null;
        $this->platform = $values['platform'] ?? null;
        $this->siteScript = $values['siteScript'] ?? null;
        $this->storeId = $values['storeId'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
