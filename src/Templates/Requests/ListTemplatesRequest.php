<?php

namespace Mailchimp\Templates\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Templates\Types\ListTemplatesRequestSortField;
use Mailchimp\Templates\Types\ListTemplatesRequestContentType;
use Mailchimp\Templates\Types\ListTemplatesRequestSortDir;

class ListTemplatesRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $fields A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     */
    public ?array $fields;

    /**
     * @var ?array<string> $excludeFields A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     */
    public ?array $excludeFields;

    /**
     * @var ?int $count The number of records to return. Default value is 10. Maximum value is 1000
     */
    public ?int $count;

    /**
     * @var ?int $offset Used for [pagination](https://mailchimp.com/developer/marketing/docs/methods-parameters/#pagination), this is the number of records from a collection to skip. Default value is 0.
     */
    public ?int $offset;

    /**
     * @var ?string $createdBy The Mailchimp account user who created the template.
     */
    public ?string $createdBy;

    /**
     * @var ?string $sinceDateCreated Restrict the response to templates created after the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $sinceDateCreated;

    /**
     * @var ?string $beforeDateCreated Restrict the response to templates created before the set date. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     */
    public ?string $beforeDateCreated;

    /**
     * @var ?string $type Limit results based on template type.
     */
    public ?string $type;

    /**
     * @var ?string $category Limit results based on category.
     */
    public ?string $category;

    /**
     * @var ?string $folderId The unique folder id.
     */
    public ?string $folderId;

    /**
     * @var ?value-of<ListTemplatesRequestSortField> $sortField Returns user templates sorted by the specified field.
     */
    public ?string $sortField;

    /**
     * @var ?value-of<ListTemplatesRequestContentType> $contentType Limit results based on how the template's content is put together. Only templates of type `user` can be filtered by `content_type`. If you want to retrieve saved templates created with the legacy email editor, then filter `content_type` to `template`. If you'd rather pull your saved templates for the new editor, filter to `multichannel`. For code your own templates, filter to `html`.
     */
    public ?string $contentType;

    /**
     * @var ?value-of<ListTemplatesRequestSortDir> $sortDir Determines the order direction for sorted results.
     */
    public ?string $sortDir;

    /**
     * @param array{
     *   fields?: ?array<string>,
     *   excludeFields?: ?array<string>,
     *   count?: ?int,
     *   offset?: ?int,
     *   createdBy?: ?string,
     *   sinceDateCreated?: ?string,
     *   beforeDateCreated?: ?string,
     *   type?: ?string,
     *   category?: ?string,
     *   folderId?: ?string,
     *   sortField?: ?value-of<ListTemplatesRequestSortField>,
     *   contentType?: ?value-of<ListTemplatesRequestContentType>,
     *   sortDir?: ?value-of<ListTemplatesRequestSortDir>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fields = $values['fields'] ?? null;
        $this->excludeFields = $values['excludeFields'] ?? null;
        $this->count = $values['count'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->createdBy = $values['createdBy'] ?? null;
        $this->sinceDateCreated = $values['sinceDateCreated'] ?? null;
        $this->beforeDateCreated = $values['beforeDateCreated'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->category = $values['category'] ?? null;
        $this->folderId = $values['folderId'] ?? null;
        $this->sortField = $values['sortField'] ?? null;
        $this->contentType = $values['contentType'] ?? null;
        $this->sortDir = $values['sortDir'] ?? null;
    }
}
