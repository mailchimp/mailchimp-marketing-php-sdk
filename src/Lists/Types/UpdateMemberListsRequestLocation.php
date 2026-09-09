<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Union;

/**
 * Subscriber location information.
 */
class UpdateMemberListsRequestLocation extends JsonSerializableType
{
    /**
     * @var (
     *    float
     *   |string
     * )|null $latitude
     */
    #[JsonProperty('latitude'), Union('float', 'string', 'null')]
    public float|string|null $latitude;

    /**
     * @var (
     *    float
     *   |string
     * )|null $longitude
     */
    #[JsonProperty('longitude'), Union('float', 'string', 'null')]
    public float|string|null $longitude;

    /**
     * @param array{
     *   latitude?: (
     *    float
     *   |string
     * )|null,
     *   longitude?: (
     *    float
     *   |string
     * )|null,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->latitude = $values['latitude'] ?? null;
        $this->longitude = $values['longitude'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
