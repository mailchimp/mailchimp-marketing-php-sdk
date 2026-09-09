<?php

namespace Mailchimp\Lists\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

class BatchSubscribeOrUnsubscribeListsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $skipMergeValidation If skip_merge_validation is true, member data will be accepted without merge field values, even if the merge field is usually required. This defaults to false.
     */
    public ?bool $skipMergeValidation;

    /**
     * @var ?bool $skipDuplicateCheck If skip_duplicate_check is true, we will ignore duplicates sent in the request when using the batch sub/unsub on the lists endpoint. The status of the first appearance in the request will be saved. This defaults to false.
     */
    public ?bool $skipDuplicateCheck;

    /**
     * @var array<(
     *    mixed
     * )> $members An array of objects, each representing an email address and the subscription status for a specific list. Up to 500 members may be added or updated with each API call.
     */
    #[JsonProperty('members'), ArrayType(['mixed'])]
    public array $members;

    /**
     * @var ?bool $syncTags Whether this batch operation will replace all existing tags with tags in request.
     */
    #[JsonProperty('sync_tags')]
    public ?bool $syncTags;

    /**
     * @var ?bool $updateExisting Whether this batch operation will change existing members' subscription status.
     */
    #[JsonProperty('update_existing')]
    public ?bool $updateExisting;

    /**
     * @param array{
     *   members: array<(
     *    mixed
     * )>,
     *   skipMergeValidation?: ?bool,
     *   skipDuplicateCheck?: ?bool,
     *   syncTags?: ?bool,
     *   updateExisting?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->skipMergeValidation = $values['skipMergeValidation'] ?? null;
        $this->skipDuplicateCheck = $values['skipDuplicateCheck'] ?? null;
        $this->members = $values['members'];
        $this->syncTags = $values['syncTags'] ?? null;
        $this->updateExisting = $values['updateExisting'] ?? null;
    }
}
