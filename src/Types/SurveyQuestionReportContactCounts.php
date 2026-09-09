<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * For email question types, how many are new, known, or unknown contacts.
 */
class SurveyQuestionReportContactCounts extends JsonSerializableType
{
    /**
     * @var ?int $known The number of known contacts that responded to this survey.
     */
    #[JsonProperty('known')]
    public ?int $known;

    /**
     * @var ?int $new The number of new contacts that responded to this survey.
     */
    #[JsonProperty('new')]
    public ?int $new;

    /**
     * @var ?int $unknown The number of unknown contacts that responded to this survey.
     */
    #[JsonProperty('unknown')]
    public ?int $unknown;

    /**
     * @param array{
     *   known?: ?int,
     *   new?: ?int,
     *   unknown?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->known = $values['known'] ?? null;
        $this->new = $values['new'] ?? null;
        $this->unknown = $values['unknown'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
