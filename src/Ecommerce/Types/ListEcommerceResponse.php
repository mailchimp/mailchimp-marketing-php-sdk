<?php

namespace Mailchimp\Ecommerce\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * This resource serves as a namespace for e-commerce-related resources.
 */
class ListEcommerceResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListEcommerceResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListEcommerceResponseLinksItem::class])]
    public ?array $links;

    /**
     * @param array{
     *   links?: ?array<ListEcommerceResponseLinksItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
