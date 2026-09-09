<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * Information about a specific template.
 */
class TemplateInstance extends JsonSerializableType
{
    /**
     * @var ?array<TemplateInstanceLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([TemplateInstanceLinksItem::class])]
    public ?array $links;

    /**
     * @var ?bool $active User templates are not 'deleted,' but rather marked as 'inactive.' Returns whether the template is still active.
     */
    #[JsonProperty('active')]
    public ?bool $active;

    /**
     * @var ?string $category If available, the category the template is listed in.
     */
    #[JsonProperty('category')]
    public ?string $category;

    /**
     * @var ?value-of<TemplateInstanceContentType> $contentType How the template's content is put together.
     */
    #[JsonProperty('content_type')]
    public ?string $contentType;

    /**
     * @var ?string $createdBy The login name for template's creator.
     */
    #[JsonProperty('created_by')]
    public ?string $createdBy;

    /**
     * @var ?DateTime $dateCreated The date and time the template was created in ISO 8601 format.
     */
    #[JsonProperty('date_created'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $dateCreated;

    /**
     * @var ?DateTime $dateEdited The date and time the template was edited in ISO 8601 format.
     */
    #[JsonProperty('date_edited'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $dateEdited;

    /**
     * @var ?bool $dragAndDrop Whether the template uses the drag and drop editor.
     */
    #[JsonProperty('drag_and_drop')]
    public ?bool $dragAndDrop;

    /**
     * @var ?string $editedBy The login name who last edited the template.
     */
    #[JsonProperty('edited_by')]
    public ?string $editedBy;

    /**
     * @var ?string $folderId The id of the folder the template is currently in.
     */
    #[JsonProperty('folder_id')]
    public ?string $folderId;

    /**
     * @var ?int $id The individual id for the template.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $name The name of the template.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?bool $responsive Whether the template contains media queries to make it responsive.
     */
    #[JsonProperty('responsive')]
    public ?bool $responsive;

    /**
     * @var ?string $shareUrl The URL used for [template sharing](https://mailchimp.com/help/share-a-template/).
     */
    #[JsonProperty('share_url')]
    public ?string $shareUrl;

    /**
     * @var ?string $thumbnail If available, the URL for a thumbnail of the template.
     */
    #[JsonProperty('thumbnail')]
    public ?string $thumbnail;

    /**
     * @var ?string $type The type of template (user, base, or gallery).
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   links?: ?array<TemplateInstanceLinksItem>,
     *   active?: ?bool,
     *   category?: ?string,
     *   contentType?: ?value-of<TemplateInstanceContentType>,
     *   createdBy?: ?string,
     *   dateCreated?: ?DateTime,
     *   dateEdited?: ?DateTime,
     *   dragAndDrop?: ?bool,
     *   editedBy?: ?string,
     *   folderId?: ?string,
     *   id?: ?int,
     *   name?: ?string,
     *   responsive?: ?bool,
     *   shareUrl?: ?string,
     *   thumbnail?: ?string,
     *   type?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->active = $values['active'] ?? null;
        $this->category = $values['category'] ?? null;
        $this->contentType = $values['contentType'] ?? null;
        $this->createdBy = $values['createdBy'] ?? null;
        $this->dateCreated = $values['dateCreated'] ?? null;
        $this->dateEdited = $values['dateEdited'] ?? null;
        $this->dragAndDrop = $values['dragAndDrop'] ?? null;
        $this->editedBy = $values['editedBy'] ?? null;
        $this->folderId = $values['folderId'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->responsive = $values['responsive'] ?? null;
        $this->shareUrl = $values['shareUrl'] ?? null;
        $this->thumbnail = $values['thumbnail'] ?? null;
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
