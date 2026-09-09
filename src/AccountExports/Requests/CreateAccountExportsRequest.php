<?php

namespace Mailchimp\AccountExports\Requests;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\AccountExports\Types\CreateAccountExportsRequestIncludeStagesItem;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

class CreateAccountExportsRequest extends JsonSerializableType
{
    /**
     * @var array<value-of<CreateAccountExportsRequestIncludeStagesItem>> $includeStages The stages of an account export to include.
     */
    #[JsonProperty('include_stages'), ArrayType(['string'])]
    public array $includeStages;

    /**
     * @var ?DateTime $sinceTimestamp An ISO 8601 date that will limit the export to only records created after a given time. For instance, the reports stage will contain any campaign sent after the given timestamp. Audiences, however, are excluded from this limit.
     */
    #[JsonProperty('since_timestamp'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sinceTimestamp;

    /**
     * @param array{
     *   includeStages: array<value-of<CreateAccountExportsRequestIncludeStagesItem>>,
     *   sinceTimestamp?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->includeStages = $values['includeStages'];
        $this->sinceTimestamp = $values['sinceTimestamp'] ?? null;
    }
}
