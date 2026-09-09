<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * Check if this ad is connected to a facebook page
 */
class FacebookAdsFeedback extends JsonSerializableType
{
    /**
     * @var ?string $audience Feedback regarding the audience of this Ad.
     */
    #[JsonProperty('audience')]
    public ?string $audience;

    /**
     * @var ?string $budget Feedback regarding the budget of this Ad.
     */
    #[JsonProperty('budget')]
    public ?string $budget;

    /**
     * @var ?string $compliance Feedback regarding the compliance of this Ad.
     */
    #[JsonProperty('compliance')]
    public ?string $compliance;

    /**
     * @var ?string $content Feedback regarding the content of this Ad.
     */
    #[JsonProperty('content')]
    public ?string $content;

    /**
     * @param array{
     *   audience?: ?string,
     *   budget?: ?string,
     *   compliance?: ?string,
     *   content?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audience = $values['audience'] ?? null;
        $this->budget = $values['budget'] ?? null;
        $this->compliance = $values['compliance'] ?? null;
        $this->content = $values['content'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
