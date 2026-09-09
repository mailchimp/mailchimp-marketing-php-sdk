<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Segment by whether someone has purchased anything.
 */
class SegmentTypeItemEcommPurchased extends JsonSerializableType
{
    /**
     * @var ?value-of<SegmentTypeItemEcommPurchasedField> $field Segment by whether someone has purchased anything.
     */
    #[JsonProperty('field')]
    public ?string $field;

    /**
     * @var ?value-of<SegmentTypeItemEcommPurchasedOp> $op Members who have have ('member') or have not ('notmember') purchased.
     */
    #[JsonProperty('op')]
    public ?string $op;

    /**
     * @param array{
     *   field?: ?value-of<SegmentTypeItemEcommPurchasedField>,
     *   op?: ?value-of<SegmentTypeItemEcommPurchasedOp>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->field = $values['field'] ?? null;
        $this->op = $values['op'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
