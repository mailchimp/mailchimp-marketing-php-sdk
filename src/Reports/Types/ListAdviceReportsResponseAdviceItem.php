<?php

namespace Mailchimp\Reports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * Campaign feedback details.
 */
class ListAdviceReportsResponseAdviceItem extends JsonSerializableType
{
    /**
     * @var ?array<ListAdviceReportsResponseAdviceItemLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListAdviceReportsResponseAdviceItemLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $message The advice message.
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?value-of<ListAdviceReportsResponseAdviceItemType> $type The sentiment type for a feedback message.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   links?: ?array<ListAdviceReportsResponseAdviceItemLinksItem>,
     *   message?: ?string,
     *   type?: ?value-of<ListAdviceReportsResponseAdviceItemType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->message = $values['message'] ?? null;
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
