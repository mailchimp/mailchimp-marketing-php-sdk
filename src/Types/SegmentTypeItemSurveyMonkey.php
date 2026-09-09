<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by interaction with a SurveyMonkey survey.
 */
class SegmentTypeItemSurveyMonkey extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemSurveyMonkeyField> $field Segment by interaction with a SurveyMonkey survey.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemSurveyMonkeyOp> $op The status of the member with regard to the survey.One of the following: has started the survey, has completed the survey, has not started the survey, or has not completed the survey.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var string $value The unique ID of the survey monkey survey.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemSurveyMonkeyField>,
     *   op: value-of<SegmentTypeItemSurveyMonkeyOp>,
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->field = $values['field'];
        $this->op = $values['op'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
