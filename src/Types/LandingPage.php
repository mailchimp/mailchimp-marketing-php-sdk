<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A summary of an individual landing page's settings and content.
 */
class LandingPage extends JsonSerializableType
{
    /**
     * @var ?array<LandingPageLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([LandingPageLinksItem::class])]
    public ?array $links;

    /**
     * @var ?DateTime $createdAt The time this landing page was created.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $createdBySource Created by mobile or web
     */
    #[JsonProperty('created_by_source')]
    public ?string $createdBySource;

    /**
     * @var ?string $description The description of this landing page.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $id A string that uniquely identifies this landing page.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $listId The list's ID associated with this landing page.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?string $name The name of this landing page.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?DateTime $publishedAt The time this landing page was published.
     */
    #[JsonProperty('published_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $publishedAt;

    /**
     * @var ?value-of<LandingPageStatus> $status The status of this landing page.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $storeId The ID of the store associated with this landing page.
     */
    #[JsonProperty('store_id')]
    public ?string $storeId;

    /**
     * @var ?int $templateId The template_id of this landing page.
     */
    #[JsonProperty('template_id')]
    public ?int $templateId;

    /**
     * @var ?string $title The title of this landing page seen in the browser's title bar.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?LandingPageTracking $tracking The tracking settings applied to this landing page.
     */
    #[JsonProperty('tracking')]
    public ?LandingPageTracking $tracking;

    /**
     * @var ?DateTime $unpublishedAt The time this landing page was unpublished.
     */
    #[JsonProperty('unpublished_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $unpublishedAt;

    /**
     * @var ?DateTime $updatedAt The time this landing page was updated at.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?string $url The url of the published landing page.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?int $webId The ID used in the Mailchimp web application.
     */
    #[JsonProperty('web_id')]
    public ?int $webId;

    /**
     * @param array{
     *   links?: ?array<LandingPageLinksItem>,
     *   createdAt?: ?DateTime,
     *   createdBySource?: ?string,
     *   description?: ?string,
     *   id?: ?string,
     *   listId?: ?string,
     *   name?: ?string,
     *   publishedAt?: ?DateTime,
     *   status?: ?value-of<LandingPageStatus>,
     *   storeId?: ?string,
     *   templateId?: ?int,
     *   title?: ?string,
     *   tracking?: ?LandingPageTracking,
     *   unpublishedAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     *   url?: ?string,
     *   webId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->createdBySource = $values['createdBySource'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->publishedAt = $values['publishedAt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->storeId = $values['storeId'] ?? null;
        $this->templateId = $values['templateId'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->tracking = $values['tracking'] ?? null;
        $this->unpublishedAt = $values['unpublishedAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->webId = $values['webId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
