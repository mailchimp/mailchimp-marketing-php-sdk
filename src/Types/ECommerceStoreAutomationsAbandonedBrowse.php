<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * abandonedBrowse automation details. abandonedBrowse is also known as Product Retargeting Email or Retarget Site Visitors on the web.
 */
class ECommerceStoreAutomationsAbandonedBrowse extends JsonSerializableType
{
    /**
     * @var ?string $id Unique ID of automation parent campaign.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isSupported Whether this store supports the abandonedBrowse automation.
     */
    #[JsonProperty('is_supported')]
    public ?bool $isSupported;

    /**
     * @var ?value-of<ECommerceStoreAutomationsAbandonedBrowseStatus> $status Status of the abandonedBrowse automation.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   id?: ?string,
     *   isSupported?: ?bool,
     *   status?: ?value-of<ECommerceStoreAutomationsAbandonedBrowseStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->isSupported = $values['isSupported'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
