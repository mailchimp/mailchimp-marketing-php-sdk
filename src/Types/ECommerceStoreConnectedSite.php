<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The Connected Site associated with the store.
 */
class ECommerceStoreConnectedSite extends JsonSerializableType
{
    /**
     * @var ?string $siteForeignId The unique identifier for the connected site.
     */
    #[JsonProperty('site_foreign_id')]
    public ?string $siteForeignId;

    /**
     * @var ?ECommerceStoreConnectedSiteSiteScript $siteScript The script used to connect your site with Mailchimp.
     */
    #[JsonProperty('site_script')]
    public ?ECommerceStoreConnectedSiteSiteScript $siteScript;

    /**
     * @param array{
     *   siteForeignId?: ?string,
     *   siteScript?: ?ECommerceStoreConnectedSiteSiteScript,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->siteForeignId = $values['siteForeignId'] ?? null;
        $this->siteScript = $values['siteScript'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
