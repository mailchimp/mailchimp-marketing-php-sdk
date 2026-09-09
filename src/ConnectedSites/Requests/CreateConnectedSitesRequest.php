<?php

namespace Mailchimp\ConnectedSites\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateConnectedSitesRequest extends JsonSerializableType
{
    /**
     * @var string $domain The connected site domain.
     */
    #[JsonProperty('domain')]
    public string $domain;

    /**
     * @var string $foreignId The unique identifier for the site.
     */
    #[JsonProperty('foreign_id')]
    public string $foreignId;

    /**
     * @param array{
     *   domain: string,
     *   foreignId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->domain = $values['domain'];
        $this->foreignId = $values['foreignId'];
    }
}
