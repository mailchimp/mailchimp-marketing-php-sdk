<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Do particular authorization constraints around this collection limit creation of new instances?
 */
class ListListsResponseConstraints extends JsonSerializableType
{
    /**
     * @var ?int $currentTotalInstances How many total instances of this resource are already in use? This is independent of any filter conditions applied to the query. Value may be larger than max_instances. As a special case, -1 is returned when access is unlimited.
     */
    #[JsonProperty('current_total_instances')]
    public ?int $currentTotalInstances;

    /**
     * @var int $maxInstances How many total instances of this resource are allowed? This is independent of any filter conditions applied to the query. As a special case, -1 indicates unlimited.
     */
    #[JsonProperty('max_instances')]
    public int $maxInstances;

    /**
     * @var bool $mayCreate May the user create additional instances of this resource?
     */
    #[JsonProperty('may_create')]
    public bool $mayCreate;

    /**
     * @param array{
     *   maxInstances: int,
     *   mayCreate: bool,
     *   currentTotalInstances?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->currentTotalInstances = $values['currentTotalInstances'] ?? null;
        $this->maxInstances = $values['maxInstances'];
        $this->mayCreate = $values['mayCreate'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
