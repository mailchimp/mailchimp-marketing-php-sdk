<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Interest categories organize interests, which are used to group subscribers based on their preferences. These correspond to Group Titles the application.
 */
class InterestCategory extends JsonSerializableType
{
    /**
     * @var ?array<InterestCategoryLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([InterestCategoryLinksItem::class])]
    public ?array $links;

    /**
     * @var ?int $displayOrder The order that the categories are displayed in the list. Lower numbers display first.
     */
    #[JsonProperty('display_order')]
    public ?int $displayOrder;

    /**
     * @var ?string $id The id for the interest category.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $listId The unique list id for the category.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?string $title The text description of this category. This field appears on signup forms and is often phrased as a question.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?value-of<InterestCategoryType> $type Determines how this category’s interests appear on signup forms.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   links?: ?array<InterestCategoryLinksItem>,
     *   displayOrder?: ?int,
     *   id?: ?string,
     *   listId?: ?string,
     *   title?: ?string,
     *   type?: ?value-of<InterestCategoryType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->displayOrder = $values['displayOrder'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->title = $values['title'] ?? null;
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
