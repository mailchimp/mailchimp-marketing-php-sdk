<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Lists\Types\CreateInterestCategoryListsRequestType;

class CreateInterestCategoryListsRequest extends JsonSerializableType
{
    /**
     * @var ?int $displayOrder The order that the categories are displayed in the list. Lower numbers display first.
     */
    #[JsonProperty('display_order')]
    public ?int $displayOrder;

    /**
     * @var string $title The text description of this category. This field appears on signup forms and is often phrased as a question.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var value-of<CreateInterestCategoryListsRequestType> $type Determines how this category’s interests appear on signup forms.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   title: string,
     *   type: value-of<CreateInterestCategoryListsRequestType>,
     *   displayOrder?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->displayOrder = $values['displayOrder'] ?? null;
        $this->title = $values['title'];
        $this->type = $values['type'];
    }
}
