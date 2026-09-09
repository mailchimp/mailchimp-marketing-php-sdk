<?php

namespace Mailchimp\Batches\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

class CreateBatchesRequestOperationsItem extends JsonSerializableType
{
    /**
     * @var ?string $body A string containing the JSON body to use with the request.
     */
    #[JsonProperty('body')]
    public ?string $body;

    /**
     * @var ?CreateBatchesRequestOperationsItemHeaders $headers Any HTTP headers to include with the request.
     */
    #[JsonProperty('headers')]
    public ?CreateBatchesRequestOperationsItemHeaders $headers;

    /**
     * @var value-of<CreateBatchesRequestOperationsItemMethod> $method The HTTP method to use for the operation.
     */
    #[JsonProperty('method')]
    public string $method;

    /**
     * @var ?string $operationId An optional client-supplied id returned with the operation results.
     */
    #[JsonProperty('operation_id')]
    public ?string $operationId;

    /**
     * @var ?CreateBatchesRequestOperationsItemParams $params Any request query parameters. Example parameters: {"count":10, "offset":0}
     */
    #[JsonProperty('params')]
    public ?CreateBatchesRequestOperationsItemParams $params;

    /**
     * @var string $path The relative path to use for the operation.
     */
    #[JsonProperty('path')]
    public string $path;

    /**
     * @param array{
     *   method: value-of<CreateBatchesRequestOperationsItemMethod>,
     *   path: string,
     *   body?: ?string,
     *   headers?: ?CreateBatchesRequestOperationsItemHeaders,
     *   operationId?: ?string,
     *   params?: ?CreateBatchesRequestOperationsItemParams,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'] ?? null;
        $this->headers = $values['headers'] ?? null;
        $this->method = $values['method'];
        $this->operationId = $values['operationId'] ?? null;
        $this->params = $values['params'] ?? null;
        $this->path = $values['path'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
