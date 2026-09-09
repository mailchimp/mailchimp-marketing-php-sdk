<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class ReportingFacebookAdAudienceEmailSource extends JsonSerializableType
{
    /**
     * @var ?bool $isSegment Is the source reference a segment
     */
    #[JsonProperty('is_segment')]
    public ?bool $isSegment;

    /**
     * @var ?string $listName Associated list name to the source
     */
    #[JsonProperty('list_name')]
    public ?string $listName;

    /**
     * @var ?string $name Email source name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $segmentType Segment type if this source is tied to a segment
     */
    #[JsonProperty('segment_type')]
    public ?string $segmentType;

    /**
     * @var ?string $type Type of the email source
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   isSegment?: ?bool,
     *   listName?: ?string,
     *   name?: ?string,
     *   segmentType?: ?string,
     *   type?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->isSegment = $values['isSegment'] ?? null;
        $this->listName = $values['listName'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->segmentType = $values['segmentType'] ?? null;
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
