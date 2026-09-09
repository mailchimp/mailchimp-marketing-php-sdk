<?php

namespace Mailchimp\SmsCampaigns\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;

class UpdateSmsCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?string $name The name of the campaign.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $folderId The ID of the folder to place this campaign in.
     */
    #[JsonProperty('folder_id')]
    public ?string $folderId;

    /**
     * @var ?array<int> $segments The segment IDs to target for this campaign.
     */
    #[JsonProperty('segments'), ArrayType(['integer'])]
    public ?array $segments;

    /**
     * @var ?array<int> $excludedSegments The segment IDs to exclude from this campaign.
     */
    #[JsonProperty('excluded_segments'), ArrayType(['integer'])]
    public ?array $excludedSegments;

    /**
     * @param array{
     *   name?: ?string,
     *   folderId?: ?string,
     *   segments?: ?array<int>,
     *   excludedSegments?: ?array<int>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->folderId = $values['folderId'] ?? null;
        $this->segments = $values['segments'] ?? null;
        $this->excludedSegments = $values['excludedSegments'] ?? null;
    }
}
