<?php

namespace Mailchimp\LandingPages\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\LandingPages\Types\CreateLandingPagesRequestTracking;
use Mailchimp\LandingPages\Types\CreateLandingPagesRequestType;

class CreateLandingPagesRequest extends JsonSerializableType
{
    /**
     * @var ?bool $useDefaultList Will create the Landing Page using the account's Default List instead of requiring a list_id.
     */
    public ?bool $useDefaultList;

    /**
     * @var ?string $description The description of this landing page.
     */
    #[JsonProperty('description')]
    public ?string $description;

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
     * @var ?CreateLandingPagesRequestTracking $tracking The tracking settings applied to this landing page.
     */
    #[JsonProperty('tracking')]
    public ?CreateLandingPagesRequestTracking $tracking;

    /**
     * @var ?value-of<CreateLandingPagesRequestType> $type The type of template the landing page has.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   useDefaultList?: ?bool,
     *   description?: ?string,
     *   listId?: ?string,
     *   name?: ?string,
     *   storeId?: ?string,
     *   templateId?: ?int,
     *   title?: ?string,
     *   tracking?: ?CreateLandingPagesRequestTracking,
     *   type?: ?value-of<CreateLandingPagesRequestType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->useDefaultList = $values['useDefaultList'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->storeId = $values['storeId'] ?? null;
        $this->templateId = $values['templateId'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->tracking = $values['tracking'] ?? null;
        $this->type = $values['type'] ?? null;
    }
}
