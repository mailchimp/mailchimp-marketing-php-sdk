<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Union;
use Mailchimp\Core\Types\Date;

/**
 * The status of a batch request
 */
class Batch extends JsonSerializableType
{
    /**
     * @var ?array<BatchLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([BatchLinksItem::class])]
    public ?array $links;

    /**
     * @var (
     *    DateTime
     *   |value-of<BatchCompletedAtOne>
     * )|null $completedAt The date and time when all operations in the batch request completed in ISO 8601 format.
     */
    #[JsonProperty('completed_at'), Union('datetime', 'string', 'null')]
    public DateTime|string|null $completedAt;

    /**
     * @var ?int $erroredOperations The number of completed operations that returned an error.
     */
    #[JsonProperty('errored_operations')]
    public ?int $erroredOperations;

    /**
     * @var ?int $finishedOperations The number of completed operations. This includes operations that returned an error.
     */
    #[JsonProperty('finished_operations')]
    public ?int $finishedOperations;

    /**
     * @var ?string $id A string that uniquely identifies this batch request.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $responseBodyUrl The URL of the gzipped archive of the results of all the operations.
     */
    #[JsonProperty('response_body_url')]
    public ?string $responseBodyUrl;

    /**
     * @var ?value-of<BatchStatus> $status The status of the batch call. [Learn more](https://mailchimp.com/developer/marketing/guides/run-async-requests-batch-endpoint/#check-the-status-of-a-batch-operation) about the batch operation status.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?DateTime $submittedAt The date and time when the server received the batch request in ISO 8601 format.
     */
    #[JsonProperty('submitted_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $submittedAt;

    /**
     * @var ?int $totalOperations The total number of operations to complete as part of this batch request. For GET requests requiring pagination, each page counts as a separate operation.
     */
    #[JsonProperty('total_operations')]
    public ?int $totalOperations;

    /**
     * @param array{
     *   links?: ?array<BatchLinksItem>,
     *   completedAt?: (
     *    DateTime
     *   |value-of<BatchCompletedAtOne>
     * )|null,
     *   erroredOperations?: ?int,
     *   finishedOperations?: ?int,
     *   id?: ?string,
     *   responseBodyUrl?: ?string,
     *   status?: ?value-of<BatchStatus>,
     *   submittedAt?: ?DateTime,
     *   totalOperations?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->completedAt = $values['completedAt'] ?? null;
        $this->erroredOperations = $values['erroredOperations'] ?? null;
        $this->finishedOperations = $values['finishedOperations'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->responseBodyUrl = $values['responseBodyUrl'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->submittedAt = $values['submittedAt'] ?? null;
        $this->totalOperations = $values['totalOperations'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
