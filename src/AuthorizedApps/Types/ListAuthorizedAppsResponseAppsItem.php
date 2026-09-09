<?php

namespace Mailchimp\AuthorizedApps\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

/**
 * An authorized app.
 */
class ListAuthorizedAppsResponseAppsItem extends JsonSerializableType
{
    /**
     * @var ?array<ListAuthorizedAppsResponseAppsItemLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([ListAuthorizedAppsResponseAppsItemLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $description A short description of the application.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?int $id The ID for the application.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $name The name of the application.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<string> $users An array of usernames for users who have linked the app.
     */
    #[JsonProperty('users'), ArrayType(['string'])]
    public ?array $users;

    /**
     * @param array{
     *   links?: ?array<ListAuthorizedAppsResponseAppsItemLinksItem>,
     *   description?: ?string,
     *   id?: ?int,
     *   name?: ?string,
     *   users?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->users = $values['users'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
