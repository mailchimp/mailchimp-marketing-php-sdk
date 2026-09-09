<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A single instance of a goal activity.
 */
class ListMemberGoalsListsResponseGoalsItem extends JsonSerializableType
{
    /**
     * @var ?string $data Any extra data passed with the Goal event.
     */
    #[JsonProperty('data')]
    public ?string $data;

    /**
     * @var ?string $event The name/type of Goal event triggered.
     */
    #[JsonProperty('event')]
    public ?string $event;

    /**
     * @var ?int $goalId The id for a Goal event.
     */
    #[JsonProperty('goal_id')]
    public ?int $goalId;

    /**
     * @var ?DateTime $lastVisitedAt The date and time the user last triggered the Goal event in ISO 8601 format.
     */
    #[JsonProperty('last_visited_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastVisitedAt;

    /**
     * @param array{
     *   data?: ?string,
     *   event?: ?string,
     *   goalId?: ?int,
     *   lastVisitedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->data = $values['data'] ?? null;
        $this->event = $values['event'] ?? null;
        $this->goalId = $values['goalId'] ?? null;
        $this->lastVisitedAt = $values['lastVisitedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
