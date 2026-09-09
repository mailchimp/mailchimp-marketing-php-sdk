<?php

namespace Mailchimp\Lists\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Options for customizing your signup form header.
 */
class CreateSignupFormListsRequestHeader extends JsonSerializableType
{
    /**
     * @var ?value-of<CreateSignupFormListsRequestHeaderImageAlign> $imageAlign Image alignment.
     */
    #[JsonProperty('image_align')]
    public ?string $imageAlign;

    /**
     * @var ?string $imageAlt Alt text for the image.
     */
    #[JsonProperty('image_alt')]
    public ?string $imageAlt;

    /**
     * @var ?string $imageBorderColor Image border color.
     */
    #[JsonProperty('image_border_color')]
    public ?string $imageBorderColor;

    /**
     * @var ?value-of<CreateSignupFormListsRequestHeaderImageBorderStyle> $imageBorderStyle Image border style.
     */
    #[JsonProperty('image_border_style')]
    public ?string $imageBorderStyle;

    /**
     * @var ?string $imageBorderWidth Image border width.
     */
    #[JsonProperty('image_border_width')]
    public ?string $imageBorderWidth;

    /**
     * @var ?string $imageHeight Image height, in pixels.
     */
    #[JsonProperty('image_height')]
    public ?string $imageHeight;

    /**
     * @var ?string $imageLink The URL that the header image will link to.
     */
    #[JsonProperty('image_link')]
    public ?string $imageLink;

    /**
     * @var ?value-of<CreateSignupFormListsRequestHeaderImageTarget> $imageTarget Image link target.
     */
    #[JsonProperty('image_target')]
    public ?string $imageTarget;

    /**
     * @var ?string $imageUrl Header image URL.
     */
    #[JsonProperty('image_url')]
    public ?string $imageUrl;

    /**
     * @var ?string $imageWidth Image width, in pixels.
     */
    #[JsonProperty('image_width')]
    public ?string $imageWidth;

    /**
     * @var ?string $text Header text.
     */
    #[JsonProperty('text')]
    public ?string $text;

    /**
     * @param array{
     *   imageAlign?: ?value-of<CreateSignupFormListsRequestHeaderImageAlign>,
     *   imageAlt?: ?string,
     *   imageBorderColor?: ?string,
     *   imageBorderStyle?: ?value-of<CreateSignupFormListsRequestHeaderImageBorderStyle>,
     *   imageBorderWidth?: ?string,
     *   imageHeight?: ?string,
     *   imageLink?: ?string,
     *   imageTarget?: ?value-of<CreateSignupFormListsRequestHeaderImageTarget>,
     *   imageUrl?: ?string,
     *   imageWidth?: ?string,
     *   text?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->imageAlign = $values['imageAlign'] ?? null;
        $this->imageAlt = $values['imageAlt'] ?? null;
        $this->imageBorderColor = $values['imageBorderColor'] ?? null;
        $this->imageBorderStyle = $values['imageBorderStyle'] ?? null;
        $this->imageBorderWidth = $values['imageBorderWidth'] ?? null;
        $this->imageHeight = $values['imageHeight'] ?? null;
        $this->imageLink = $values['imageLink'] ?? null;
        $this->imageTarget = $values['imageTarget'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->imageWidth = $values['imageWidth'] ?? null;
        $this->text = $values['text'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
