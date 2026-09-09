<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Assign subscribers to interests to group them together. Interests are referred to as 'group names' in the Mailchimp application.
 */
class Interest extends JsonSerializableType
{
    /**
     * @var ?array<InterestLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([InterestLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $categoryId The id for the interest category.
     */
    #[JsonProperty('category_id')]
    public ?string $categoryId;

    /**
     * @var ?int $displayOrder The display order for interests.
     */
    #[JsonProperty('display_order')]
    public ?int $displayOrder;

    /**
     * @var ?string $id The ID for the interest.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $listId The ID for the list that this interest belongs to.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?string $name The name of the interest. This can be shown publicly on a subscription form.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $subscriberCount The number of subscribers associated with this interest.
     */
    #[JsonProperty('subscriber_count')]
    public ?string $subscriberCount;

    /**
     * @param array{
     *   links?: ?array<InterestLinksItem>,
     *   categoryId?: ?string,
     *   displayOrder?: ?int,
     *   id?: ?string,
     *   listId?: ?string,
     *   name?: ?string,
     *   subscriberCount?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->categoryId = $values['categoryId'] ?? null;
        $this->displayOrder = $values['displayOrder'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->subscriberCount = $values['subscriberCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
