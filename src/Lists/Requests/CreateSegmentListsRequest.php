<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Lists\Types\CreateSegmentListsRequestOptions;
use Mailchimp\Core\Types\ArrayType;

class CreateSegmentListsRequest extends JsonSerializableType
{
    /**
     * @var string $name The name of the segment.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?CreateSegmentListsRequestOptions $options The [conditions of the segment](https://mailchimp.com/help/save-and-manage-segments/). Static and fuzzy segments don't have conditions.
     */
    #[JsonProperty('options')]
    public ?CreateSegmentListsRequestOptions $options;

    /**
     * @var ?array<string> $staticSegment An array of emails to be used for a static segment. Any emails provided that are not present on the list will be ignored. Passing an empty array will create a static segment without any subscribers. This field cannot be provided with the options field.
     */
    #[JsonProperty('static_segment'), ArrayType(['string'])]
    public ?array $staticSegment;

    /**
     * @param array{
     *   name: string,
     *   options?: ?CreateSegmentListsRequestOptions,
     *   staticSegment?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->options = $values['options'] ?? null;
        $this->staticSegment = $values['staticSegment'] ?? null;
    }
}
