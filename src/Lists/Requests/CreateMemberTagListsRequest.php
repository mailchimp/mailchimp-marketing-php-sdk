<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Lists\Types\CreateMemberTagListsRequestTagsItem;
use Mailchimp\Core\Types\ArrayType;

class CreateMemberTagListsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $isSyncing When is_syncing is true, automations based on the tags in the request will not fire
     */
    #[JsonProperty('is_syncing')]
    public ?bool $isSyncing;

    /**
     * @var array<CreateMemberTagListsRequestTagsItem> $tags A list of tags assigned to the list member.
     */
    #[JsonProperty('tags'), ArrayType([CreateMemberTagListsRequestTagsItem::class])]
    public array $tags;

    /**
     * @param array{
     *   tags: array<CreateMemberTagListsRequestTagsItem>,
     *   isSyncing?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->isSyncing = $values['isSyncing'] ?? null;
        $this->tags = $values['tags'];
    }
}
