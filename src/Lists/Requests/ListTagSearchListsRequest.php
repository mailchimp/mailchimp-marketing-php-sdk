<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;

class ListTagSearchListsRequest extends JsonSerializableType
{
    /**
     * @var ?string $name The search query used to filter tags.  The search query will be compared to each tag as a prefix, so all tags that have a name starting with this field will be returned.
     */
    public ?string $name;

    /**
     * @param array{
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
    }
}
