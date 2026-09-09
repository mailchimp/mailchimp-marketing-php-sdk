<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The script used to connect your site with Mailchimp.
 */
class ECommerceStoreConnectedSiteSiteScript extends JsonSerializableType
{
    /**
     * @var ?string $fragment A pre-built script that you can copy-and-paste into your site to integrate it with Mailchimp.
     */
    #[JsonProperty('fragment')]
    public ?string $fragment;

    /**
     * @var ?string $url The URL used for any integrations that offer built-in support for connected sites.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   fragment?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fragment = $values['fragment'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
