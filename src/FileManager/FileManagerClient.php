<?php

namespace Mailchimp\FileManager;

use Psr\Http\Client\ClientInterface;
use Mailchimp\Core\Client\RawClient;
use Mailchimp\FileManager\Types\ListFileManagerResponseItem;
use Mailchimp\Exceptions\MailchimpException;
use Mailchimp\Exceptions\MailchimpApiException;
use Mailchimp\Core\Json\JsonApiRequest;
use Mailchimp\Environments;
use Mailchimp\Core\Client\HttpMethod;
use Mailchimp\Core\Json\JsonDecoder;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Mailchimp\FileManager\Requests\ListFilesFileManagerRequest;
use Mailchimp\Core\Pagination\Pager;
use Mailchimp\Types\GalleryFile;
use Mailchimp\Core\Pagination\OffsetPager;
use Mailchimp\FileManager\Types\ListFilesFileManagerResponse;
use Mailchimp\FileManager\Requests\CreateFileFileManagerRequest;
use Mailchimp\FileManager\Requests\GetFileFileManagerRequest;
use Mailchimp\FileManager\Requests\UpdateFileFileManagerRequest;
use Mailchimp\FileManager\Requests\ListFoldersFileManagerRequest;
use Mailchimp\FileManager\Types\ListFoldersFileManagerResponseFoldersItem;
use Mailchimp\FileManager\Types\ListFoldersFileManagerResponse;
use Mailchimp\FileManager\Requests\CreateFolderFileManagerRequest;
use Mailchimp\FileManager\Types\CreateFolderFileManagerResponse;
use Mailchimp\FileManager\Requests\GetFolderFileManagerRequest;
use Mailchimp\FileManager\Types\GetFolderFileManagerResponse;
use Mailchimp\FileManager\Requests\UpdateFolderFileManagerRequest;
use Mailchimp\FileManager\Types\UpdateFolderFileManagerResponse;
use Mailchimp\FileManager\Requests\ListFolderFilesFileManagerRequest;
use Mailchimp\FileManager\Types\ListFolderFilesFileManagerResponse;

class FileManagerClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * Get information about the file-manager endpoint's resources
     *
     * Example:
     * ```php
     * $client->fileManager->list();
     * ```
     *
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<ListFileManagerResponseItem>
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function list(?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/file-manager",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return JsonDecoder::decodeArray($json, [ListFileManagerResponseItem::class]); // @phpstan-ignore-line
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a list of available images and files stored in the File Manager for the account.
     *
     * Example:
     * ```php
     * $client->fileManager->listFiles(
     *     new ListFilesFileManagerRequest([]),
     * );
     * ```
     *
     * @param ListFilesFileManagerRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<GalleryFile>
     */
    public function listFiles(ListFilesFileManagerRequest $request = new ListFilesFileManagerRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListFilesFileManagerRequest $request) => $this->_listFiles($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListFilesFileManagerRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListFilesFileManagerRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListFilesFileManagerResponse $response) => $response?->files ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Upload a new image or file to the File Manager.
     *
     * Example:
     * ```php
     * $client->fileManager->createFile(
     *     new CreateFileFileManagerRequest([
     *         'fileData' => 'file_data',
     *         'name' => 'name',
     *     ]),
     * );
     * ```
     *
     * @param CreateFileFileManagerRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GalleryFile
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createFile(CreateFileFileManagerRequest $request, ?array $options = null): ?GalleryFile
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/file-manager/files",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return GalleryFile::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get information about a specific file in the File Manager.
     *
     * Example:
     * ```php
     * $client->fileManager->getFile(
     *     'file_id',
     *     new GetFileFileManagerRequest([]),
     * );
     * ```
     *
     * @param string $fileId The unique id for the File Manager file.
     * @param GetFileFileManagerRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GalleryFile
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getFile(string $fileId, GetFileFileManagerRequest $request = new GetFileFileManagerRequest(), ?array $options = null): ?GalleryFile
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/file-manager/files/{$fileId}",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return GalleryFile::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Remove a specific file from the File Manager.
     *
     * Example:
     * ```php
     * $client->fileManager->deleteFile(
     *     'file_id',
     * );
     * ```
     *
     * @param string $fileId The unique id for the File Manager file.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function deleteFile(string $fileId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/file-manager/files/{$fileId}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Update a file in the File Manager.
     *
     * Example:
     * ```php
     * $client->fileManager->updateFile(
     *     'file_id',
     *     new UpdateFileFileManagerRequest([]),
     * );
     * ```
     *
     * @param string $fileId The unique id for the File Manager file.
     * @param UpdateFileFileManagerRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GalleryFile
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateFile(string $fileId, UpdateFileFileManagerRequest $request = new UpdateFileFileManagerRequest(), ?array $options = null): ?GalleryFile
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/file-manager/files/{$fileId}",
                    method: HttpMethod::PATCH,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return GalleryFile::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a list of all folders in the File Manager.
     *
     * Example:
     * ```php
     * $client->fileManager->listFolders(
     *     new ListFoldersFileManagerRequest([]),
     * );
     * ```
     *
     * @param ListFoldersFileManagerRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ListFoldersFileManagerResponseFoldersItem>
     */
    public function listFolders(ListFoldersFileManagerRequest $request = new ListFoldersFileManagerRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListFoldersFileManagerRequest $request) => $this->_listFolders($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListFoldersFileManagerRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListFoldersFileManagerRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListFoldersFileManagerResponse $response) => $response?->folders ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Create a new folder in the File Manager.
     *
     * Example:
     * ```php
     * $client->fileManager->createFolder(
     *     new CreateFolderFileManagerRequest([
     *         'name' => 'name',
     *     ]),
     * );
     * ```
     *
     * @param CreateFolderFileManagerRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateFolderFileManagerResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createFolder(CreateFolderFileManagerRequest $request, ?array $options = null): ?CreateFolderFileManagerResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/file-manager/folders",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return CreateFolderFileManagerResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get information about a specific folder in the File Manager.
     *
     * Example:
     * ```php
     * $client->fileManager->getFolder(
     *     'folder_id',
     *     new GetFolderFileManagerRequest([]),
     * );
     * ```
     *
     * @param string $folderId The unique id for the File Manager folder.
     * @param GetFolderFileManagerRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetFolderFileManagerResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getFolder(string $folderId, GetFolderFileManagerRequest $request = new GetFolderFileManagerRequest(), ?array $options = null): ?GetFolderFileManagerResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/file-manager/folders/{$folderId}",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return GetFolderFileManagerResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Delete a specific folder in the File Manager.
     *
     * Example:
     * ```php
     * $client->fileManager->deleteFolder(
     *     'folder_id',
     * );
     * ```
     *
     * @param string $folderId The unique id for the File Manager folder.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function deleteFolder(string $folderId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/file-manager/folders/{$folderId}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                return;
            }
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Update a specific File Manager folder.
     *
     * Example:
     * ```php
     * $client->fileManager->updateFolder(
     *     'folder_id',
     *     new UpdateFolderFileManagerRequest([
     *         'name' => 'name',
     *     ]),
     * );
     * ```
     *
     * @param string $folderId The unique id for the File Manager folder.
     * @param UpdateFolderFileManagerRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateFolderFileManagerResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateFolder(string $folderId, UpdateFolderFileManagerRequest $request, ?array $options = null): ?UpdateFolderFileManagerResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/file-manager/folders/{$folderId}",
                    method: HttpMethod::PATCH,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return UpdateFolderFileManagerResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a list of available images and files stored in this folder.
     *
     * Example:
     * ```php
     * $client->fileManager->listFolderFiles(
     *     'folder_id',
     *     new ListFolderFilesFileManagerRequest([]),
     * );
     * ```
     *
     * @param string $folderId The unique id for the File Manager folder.
     * @param ListFolderFilesFileManagerRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<GalleryFile>
     */
    public function listFolderFiles(string $folderId, ListFolderFilesFileManagerRequest $request = new ListFolderFilesFileManagerRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListFolderFilesFileManagerRequest $request) => $this->_listFolderFiles($folderId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListFolderFilesFileManagerRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListFolderFilesFileManagerRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListFolderFilesFileManagerResponse $response) => $response?->files ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get a list of available images and files stored in the File Manager for the account.
     *
     * @param ListFilesFileManagerRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListFilesFileManagerResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listFiles(ListFilesFileManagerRequest $request = new ListFilesFileManagerRequest(), ?array $options = null): ?ListFilesFileManagerResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->count != null) {
            $query['count'] = $request->count;
        }
        if ($request->offset != null) {
            $query['offset'] = $request->offset;
        }
        if ($request->type != null) {
            $query['type'] = $request->type;
        }
        if ($request->createdBy != null) {
            $query['created_by'] = $request->createdBy;
        }
        if ($request->beforeCreatedAt != null) {
            $query['before_created_at'] = $request->beforeCreatedAt;
        }
        if ($request->sinceCreatedAt != null) {
            $query['since_created_at'] = $request->sinceCreatedAt;
        }
        if ($request->sortField != null) {
            $query['sort_field'] = $request->sortField;
        }
        if ($request->sortDir != null) {
            $query['sort_dir'] = $request->sortDir;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/file-manager/files",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListFilesFileManagerResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a list of all folders in the File Manager.
     *
     * @param ListFoldersFileManagerRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListFoldersFileManagerResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listFolders(ListFoldersFileManagerRequest $request = new ListFoldersFileManagerRequest(), ?array $options = null): ?ListFoldersFileManagerResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->count != null) {
            $query['count'] = $request->count;
        }
        if ($request->offset != null) {
            $query['offset'] = $request->offset;
        }
        if ($request->createdBy != null) {
            $query['created_by'] = $request->createdBy;
        }
        if ($request->beforeCreatedAt != null) {
            $query['before_created_at'] = $request->beforeCreatedAt;
        }
        if ($request->sinceCreatedAt != null) {
            $query['since_created_at'] = $request->sinceCreatedAt;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/file-manager/folders",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListFoldersFileManagerResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Get a list of available images and files stored in this folder.
     *
     * @param string $folderId The unique id for the File Manager folder.
     * @param ListFolderFilesFileManagerRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListFolderFilesFileManagerResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listFolderFiles(string $folderId, ListFolderFilesFileManagerRequest $request = new ListFolderFilesFileManagerRequest(), ?array $options = null): ?ListFolderFilesFileManagerResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->count != null) {
            $query['count'] = $request->count;
        }
        if ($request->offset != null) {
            $query['offset'] = $request->offset;
        }
        if ($request->type != null) {
            $query['type'] = $request->type;
        }
        if ($request->createdBy != null) {
            $query['created_by'] = $request->createdBy;
        }
        if ($request->beforeCreatedAt != null) {
            $query['before_created_at'] = $request->beforeCreatedAt;
        }
        if ($request->sinceCreatedAt != null) {
            $query['since_created_at'] = $request->sinceCreatedAt;
        }
        if ($request->sortField != null) {
            $query['sort_field'] = $request->sortField;
        }
        if ($request->sortDir != null) {
            $query['sort_dir'] = $request->sortDir;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/file-manager/folders/{$folderId}/files",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListFolderFilesFileManagerResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new MailchimpException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new MailchimpException(message: $e->getMessage(), previous: $e);
        }
        throw new MailchimpApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
