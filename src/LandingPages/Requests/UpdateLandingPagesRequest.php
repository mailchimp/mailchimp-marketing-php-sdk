<?php

namespace Mailchimp\LandingPages\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\LandingPages\Types\UpdateLandingPagesRequestTracking;

class UpdateLandingPagesRequest extends JsonSerializableType
{
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
     * @var ?string $title The title of this landing page seen in the browser's title bar.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?UpdateLandingPagesRequestTracking $tracking The tracking settings applied to this landing page.
     */
    #[JsonProperty('tracking')]
    public ?UpdateLandingPagesRequestTracking $tracking;

    /**
     * @param array{
     *   description?: ?string,
     *   listId?: ?string,
     *   name?: ?string,
     *   storeId?: ?string,
     *   title?: ?string,
     *   tracking?: ?UpdateLandingPagesRequestTracking,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->description = $values['description'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->storeId = $values['storeId'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->tracking = $values['tracking'] ?? null;
    }
}
