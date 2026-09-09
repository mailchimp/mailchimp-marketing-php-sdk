<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * A [merge field](https://mailchimp.com/developer/marketing/docs/merge-fields/) for an audience.
 */
class SurveyQuestionReportMergeField extends JsonSerializableType
{
    /**
     * @var ?int $id An unchanging id for the merge field.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $label The [label](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for the merge field.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?value-of<SurveyQuestionReportMergeFieldType> $type The [type](https://mailchimp.com/developer/marketing/docs/merge-fields/#structure) for the merge field.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   id?: ?int,
     *   label?: ?string,
     *   type?: ?value-of<SurveyQuestionReportMergeFieldType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
