<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * This object represents a link from the resource where it is found to another resource or action that may be performed.
 */
class SubscriberListLinksItem extends JsonSerializableType
{
    /**
     * @var ?string $href This property contains a fully-qualified URL that can be called to retrieve the linked resource or perform the linked action.
     */
    #[JsonProperty('href')]
    public ?string $href;

    /**
     * @var ?value-of<SubscriberListLinksItemMethod> $method The HTTP method that should be used when accessing the URL defined in 'href'.
     */
    #[JsonProperty('method')]
    public ?string $method;

    /**
     * @var ?string $rel As with an HTML 'rel' attribute, this describes the type of link.
     */
    #[JsonProperty('rel')]
    public ?string $rel;

    /**
     * @var ?string $schema For HTTP methods that can receive bodies (POST and PUT), this is a URL representing the schema that the body should conform to.
     */
    #[JsonProperty('schema')]
    public ?string $schema;

    /**
     * @var ?string $targetSchema For GETs, this is a URL representing the schema that the response should conform to.
     */
    #[JsonProperty('targetSchema')]
    public ?string $targetSchema;

    /**
     * @param array{
     *   href?: ?string,
     *   method?: ?value-of<SubscriberListLinksItemMethod>,
     *   rel?: ?string,
     *   schema?: ?string,
     *   targetSchema?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->href = $values['href'] ?? null;
        $this->method = $values['method'] ?? null;
        $this->rel = $values['rel'] ?? null;
        $this->schema = $values['schema'] ?? null;
        $this->targetSchema = $values['targetSchema'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
