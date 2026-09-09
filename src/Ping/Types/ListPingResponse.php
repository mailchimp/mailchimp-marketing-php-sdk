<?php

namespace Mailchimp\Ping\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * API health status.
 */
class ListPingResponse extends JsonSerializableType
{
    /**
     * @var ?string $healthStatus This will return a constant string value if the request is successful. Ex. "Everything's Chimpy!"
     */
    #[JsonProperty('health_status')]
    public ?string $healthStatus;

    /**
     * @param array{
     *   healthStatus?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->healthStatus = $values['healthStatus'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
