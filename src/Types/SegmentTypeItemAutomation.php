<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by interaction with an Automation workflow.
 */
class SegmentTypeItemAutomation extends JsonSerializableType
{
    /**
     * @var value-of<SegmentTypeItemAutomationField> $field Segment by interaction with an Automation workflow.
     */
    #[JsonProperty('field')]
    public string $field;

    /**
     * @var value-of<SegmentTypeItemAutomationOp> $op The status of the member with regard to the automation workflow. One of the following: has started the workflow, has completed the workflow, has not started the workflow, or has not completed the workflow.
     */
    #[JsonProperty('op')]
    public string $op;

    /**
     * @var string $value The web id for the automation workflow to segment against.
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   field: value-of<SegmentTypeItemAutomationField>,
     *   op: value-of<SegmentTypeItemAutomationOp>,
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
