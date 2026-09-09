<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * List signup form.
 */
class SignupForm extends JsonSerializableType
{
    /**
     * @var ?array<SignupFormLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([SignupFormLinksItem::class])]
    public ?array $links;

    /**
     * @var ?array<SignupFormContentsItem> $contents The signup form body content.
     */
    #[JsonProperty('contents'), ArrayType([SignupFormContentsItem::class])]
    public ?array $contents;

    /**
     * @var ?SignupFormHeader $header Options for customizing your signup form header.
     */
    #[JsonProperty('header')]
    public ?SignupFormHeader $header;

    /**
     * @var ?string $listId The signup form's list id.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?string $signupFormUrl Signup form URL.
     */
    #[JsonProperty('signup_form_url')]
    public ?string $signupFormUrl;

    /**
     * @var ?array<SignupFormStylesItem> $styles An array of objects, each representing an element style for the signup form.
     */
    #[JsonProperty('styles'), ArrayType([SignupFormStylesItem::class])]
    public ?array $styles;

    /**
     * @param array{
     *   links?: ?array<SignupFormLinksItem>,
     *   contents?: ?array<SignupFormContentsItem>,
     *   header?: ?SignupFormHeader,
     *   listId?: ?string,
     *   signupFormUrl?: ?string,
     *   styles?: ?array<SignupFormStylesItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->contents = $values['contents'] ?? null;
        $this->header = $values['header'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->signupFormUrl = $values['signupFormUrl'] ?? null;
        $this->styles = $values['styles'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
