<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class SurveyQuestionReportOptionsItem extends JsonSerializableType
{
    /**
     * @var ?int $count The count of responses that selected this survey question option.
     */
    #[JsonProperty('count')]
    public ?int $count;

    /**
     * @var ?string $id The ID for this survey question option.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $label The label for this survey question option.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @param array{
     *   count?: ?int,
     *   id?: ?string,
     *   label?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->count = $values['count'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->label = $values['label'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
