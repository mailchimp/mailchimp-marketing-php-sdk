<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateInterestCategoryInterestListsRequest extends JsonSerializableType
{
    /**
     * @var ?int $displayOrder The display order for interests.
     */
    #[JsonProperty('display_order')]
    public ?int $displayOrder;

    /**
     * @var string $name The name of the interest. This can be shown publicly on a subscription form.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   name: string,
     *   displayOrder?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->displayOrder = $values['displayOrder'] ?? null;
        $this->name = $values['name'];
    }
}
