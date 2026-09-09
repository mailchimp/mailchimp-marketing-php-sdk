<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Lists\Types\CreateSignupFormListsRequestContentsItem;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use Mailchimp\Lists\Types\CreateSignupFormListsRequestHeader;
use Mailchimp\Lists\Types\CreateSignupFormListsRequestStylesItem;

class CreateSignupFormListsRequest extends JsonSerializableType
{
    /**
     * @var ?array<CreateSignupFormListsRequestContentsItem> $contents The signup form body content.
     */
    #[JsonProperty('contents'), ArrayType([CreateSignupFormListsRequestContentsItem::class])]
    public ?array $contents;

    /**
     * @var ?CreateSignupFormListsRequestHeader $header Options for customizing your signup form header.
     */
    #[JsonProperty('header')]
    public ?CreateSignupFormListsRequestHeader $header;

    /**
     * @var ?array<CreateSignupFormListsRequestStylesItem> $styles An array of objects, each representing an element style for the signup form.
     */
    #[JsonProperty('styles'), ArrayType([CreateSignupFormListsRequestStylesItem::class])]
    public ?array $styles;

    /**
     * @param array{
     *   contents?: ?array<CreateSignupFormListsRequestContentsItem>,
     *   header?: ?CreateSignupFormListsRequestHeader,
     *   styles?: ?array<CreateSignupFormListsRequestStylesItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contents = $values['contents'] ?? null;
        $this->header = $values['header'] ?? null;
        $this->styles = $values['styles'] ?? null;
    }
}
