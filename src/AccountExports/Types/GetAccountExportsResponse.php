<?php

namespace Mailchimp\AccountExports\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * An account export.
 */
class GetAccountExportsResponse extends JsonSerializableType
{
    /**
     * @var ?array<GetAccountExportsResponseLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([GetAccountExportsResponseLinksItem::class])]
    public ?array $links;

    /**
     * @var ?string $downloadUrl If the export is finished, the download URL for an export. URLs are only valid for 90 days after the export completes.
     */
    #[JsonProperty('download_url')]
    public ?string $downloadUrl;

    /**
     * @var ?int $exportId The ID for the export.
     */
    #[JsonProperty('export_id')]
    public ?int $exportId;

    /**
     * @var ?DateTime $finished If finished, the finish time for the export.
     */
    #[JsonProperty('finished'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $finished;

    /**
     * @var ?int $sizeInBytes The size of the uncompressed export in bytes.
     */
    #[JsonProperty('size_in_bytes')]
    public ?int $sizeInBytes;

    /**
     * @var ?DateTime $started Start time for the export.
     */
    #[JsonProperty('started'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $started;

    /**
     * @param array{
     *   links?: ?array<GetAccountExportsResponseLinksItem>,
     *   downloadUrl?: ?string,
     *   exportId?: ?int,
     *   finished?: ?DateTime,
     *   sizeInBytes?: ?int,
     *   started?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->downloadUrl = $values['downloadUrl'] ?? null;
        $this->exportId = $values['exportId'] ?? null;
        $this->finished = $values['finished'] ?? null;
        $this->sizeInBytes = $values['sizeInBytes'] ?? null;
        $this->started = $values['started'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
