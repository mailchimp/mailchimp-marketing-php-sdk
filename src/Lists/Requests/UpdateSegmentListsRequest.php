<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Lists\Types\UpdateSegmentListsRequestOptions;
use Mailchimp\Core\Types\ArrayType;

class UpdateSegmentListsRequest extends JsonSerializableType
{
    /**
     * @var ?string $name The name of the segment.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?UpdateSegmentListsRequestOptions $options The [conditions of the segment](https://mailchimp.com/help/save-and-manage-segments/). Static and fuzzy segments don't have conditions.
     */
    #[JsonProperty('options')]
    public ?UpdateSegmentListsRequestOptions $options;

    /**
     * @var ?array<string> $staticSegment An array of emails to be used for a static segment. Any emails provided that are not present on the list will be ignored. Passing an empty array for an existing static segment will reset that segment and remove all members. This field cannot be provided with the `options` field.
     */
    #[JsonProperty('static_segment'), ArrayType(['string'])]
    public ?array $staticSegment;

    /**
     * @param array{
     *   name?: ?string,
     *   options?: ?UpdateSegmentListsRequestOptions,
     *   staticSegment?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->options = $values['options'] ?? null;
        $this->staticSegment = $values['staticSegment'] ?? null;
    }
}
