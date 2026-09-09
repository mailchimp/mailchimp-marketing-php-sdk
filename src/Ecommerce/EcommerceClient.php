<?php

namespace Mailchimp\Ecommerce;

use Psr\Http\Client\ClientInterface;
use Mailchimp\Core\Client\RawClient;
use Mailchimp\Ecommerce\Types\ListEcommerceResponse;
use Mailchimp\Exceptions\MailchimpException;
use Mailchimp\Exceptions\MailchimpApiException;
use Mailchimp\Core\Json\JsonApiRequest;
use Mailchimp\Environments;
use Mailchimp\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Mailchimp\Ecommerce\Requests\ListOrdersEcommerceRequest;
use Mailchimp\Core\Pagination\Pager;
use Mailchimp\Types\ECommerceOrder;
use Mailchimp\Core\Pagination\OffsetPager;
use Mailchimp\Ecommerce\Types\ListOrdersEcommerceResponse;
use Mailchimp\Ecommerce\Requests\ListStoresEcommerceRequest;
use Mailchimp\Types\ECommerceStore;
use Mailchimp\Ecommerce\Types\ListStoresEcommerceResponse;
use Mailchimp\Ecommerce\Requests\CreateStoreEcommerceRequest;
use Mailchimp\Ecommerce\Requests\GetStoreEcommerceRequest;
use Mailchimp\Ecommerce\Requests\UpdateStoreEcommerceRequest;
use Mailchimp\Ecommerce\Requests\ListStoreCartsEcommerceRequest;
use Mailchimp\Types\ECommerceCart;
use Mailchimp\Ecommerce\Types\ListStoreCartsEcommerceResponse;
use Mailchimp\Ecommerce\Requests\CreateStoreCartEcommerceRequest;
use Mailchimp\Ecommerce\Requests\GetStoreCartEcommerceRequest;
use Mailchimp\Ecommerce\Requests\UpdateStoreCartEcommerceRequest;
use Mailchimp\Ecommerce\Requests\ListStoreCartLinesEcommerceRequest;
use Mailchimp\Types\ECommerceCartLineItem;
use Mailchimp\Ecommerce\Types\ListStoreCartLinesEcommerceResponse;
use Mailchimp\Ecommerce\Requests\CreateStoreCartLineEcommerceRequest;
use Mailchimp\Ecommerce\Requests\GetStoreCartLineEcommerceRequest;
use Mailchimp\Ecommerce\Requests\UpdateStoreCartLineEcommerceRequest;
use Mailchimp\Ecommerce\Requests\ListStoreCustomersEcommerceRequest;
use Mailchimp\Types\ECommerceCustomer;
use Mailchimp\Ecommerce\Types\ListStoreCustomersEcommerceResponse;
use Mailchimp\Ecommerce\Requests\CreateStoreCustomerEcommerceRequest;
use Mailchimp\Ecommerce\Requests\GetStoreCustomerEcommerceRequest;
use Mailchimp\Ecommerce\Requests\UpsertStoreCustomerEcommerceRequest;
use Mailchimp\Ecommerce\Requests\UpdateStoreCustomerEcommerceRequest;
use Mailchimp\Ecommerce\Requests\ListStoreOrdersEcommerceRequest;
use Mailchimp\Ecommerce\Types\ListStoreOrdersEcommerceResponse;
use Mailchimp\Ecommerce\Requests\CreateStoreOrderEcommerceRequest;
use Mailchimp\Ecommerce\Requests\GetStoreOrderEcommerceRequest;
use Mailchimp\Ecommerce\Requests\UpdateStoreOrderEcommerceRequest;
use Mailchimp\Ecommerce\Requests\ListStoreOrderLinesEcommerceRequest;
use Mailchimp\Types\ECommerceOrderLineItem;
use Mailchimp\Ecommerce\Types\ListStoreOrderLinesEcommerceResponse;
use Mailchimp\Ecommerce\Requests\CreateStoreOrderLineEcommerceRequest;
use Mailchimp\Ecommerce\Requests\GetStoreOrderLineEcommerceRequest;
use Mailchimp\Ecommerce\Requests\UpdateStoreOrderLineEcommerceRequest;
use Mailchimp\Ecommerce\Requests\ListStoreProductsEcommerceRequest;
use Mailchimp\Types\ECommerceProduct;
use Mailchimp\Ecommerce\Types\ListStoreProductsEcommerceResponse;
use Mailchimp\Ecommerce\Requests\CreateStoreProductEcommerceRequest;
use Mailchimp\Ecommerce\Requests\GetStoreProductEcommerceRequest;
use Mailchimp\Ecommerce\Requests\UpsertStoreProductEcommerceRequest;
use Mailchimp\Ecommerce\Requests\UpdateStoreProductEcommerceRequest;
use Mailchimp\Ecommerce\Requests\ListStoreProductImagesEcommerceRequest;
use Mailchimp\Ecommerce\Types\ListStoreProductImagesEcommerceResponseImagesItem;
use Mailchimp\Ecommerce\Types\ListStoreProductImagesEcommerceResponse;
use Mailchimp\Ecommerce\Requests\CreateStoreProductImageEcommerceRequest;
use Mailchimp\Ecommerce\Types\CreateStoreProductImageEcommerceResponse;
use Mailchimp\Ecommerce\Requests\GetStoreProductImageEcommerceRequest;
use Mailchimp\Ecommerce\Types\GetStoreProductImageEcommerceResponse;
use Mailchimp\Ecommerce\Requests\UpdateStoreProductImageEcommerceRequest;
use Mailchimp\Ecommerce\Types\UpdateStoreProductImageEcommerceResponse;
use Mailchimp\Ecommerce\Requests\ListStoreProductVariantsEcommerceRequest;
use Mailchimp\Types\ECommerceProductVariant;
use Mailchimp\Ecommerce\Types\ListStoreProductVariantsEcommerceResponse;
use Mailchimp\Ecommerce\Requests\CreateStoreProductVariantEcommerceRequest;
use Mailchimp\Ecommerce\Requests\GetStoreProductVariantEcommerceRequest;
use Mailchimp\Ecommerce\Requests\UpsertStoreProductVariantEcommerceRequest;
use Mailchimp\Ecommerce\Requests\UpdateStoreProductVariantEcommerceRequest;
use Mailchimp\Ecommerce\Requests\ListStorePromoRulesEcommerceRequest;
use Mailchimp\Types\ECommercePromoRule;
use Mailchimp\Ecommerce\Types\ListStorePromoRulesEcommerceResponse;
use Mailchimp\Ecommerce\Requests\CreateStorePromoRuleEcommerceRequest;
use Mailchimp\Ecommerce\Requests\GetStorePromoRuleEcommerceRequest;
use Mailchimp\Ecommerce\Requests\UpdateStorePromoRuleEcommerceRequest;
use Mailchimp\Ecommerce\Requests\ListStorePromoRulePromoCodesEcommerceRequest;
use Mailchimp\Types\ECommercePromoCode;
use Mailchimp\Ecommerce\Types\ListStorePromoRulePromoCodesEcommerceResponse;
use Mailchimp\Ecommerce\Requests\CreateStorePromoRulePromoCodeEcommerceRequest;
use Mailchimp\Ecommerce\Requests\GetStorePromoRulePromoCodeEcommerceRequest;
use Mailchimp\Ecommerce\Requests\UpdateStorePromoRulePromoCodeEcommerceRequest;

class EcommerceClient
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
     * Get information about the e-commerce endpoint's resources.
     *
     * Example:
     * ```php
     * $client->ecommerce->list();
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
     * @return ?ListEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function list(?array $options = null): ?ListEcommerceResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce",
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
                return ListEcommerceResponse::fromJson($json);
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
     * Get information about an account's orders.
     *
     * Example:
     * ```php
     * $client->ecommerce->listOrders(
     *     new ListOrdersEcommerceRequest([]),
     * );
     * ```
     *
     * @param ListOrdersEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ECommerceOrder>
     */
    public function listOrders(ListOrdersEcommerceRequest $request = new ListOrdersEcommerceRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListOrdersEcommerceRequest $request) => $this->_listOrders($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListOrdersEcommerceRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListOrdersEcommerceRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListOrdersEcommerceResponse $response) => $response?->orders ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get information about all stores in the account.
     *
     * Example:
     * ```php
     * $client->ecommerce->listStores(
     *     new ListStoresEcommerceRequest([]),
     * );
     * ```
     *
     * @param ListStoresEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ECommerceStore>
     */
    public function listStores(ListStoresEcommerceRequest $request = new ListStoresEcommerceRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListStoresEcommerceRequest $request) => $this->_listStores($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListStoresEcommerceRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListStoresEcommerceRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListStoresEcommerceResponse $response) => $response?->stores ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a new store to your Mailchimp account.
     *
     * Example:
     * ```php
     * $client->ecommerce->createStore(
     *     new CreateStoreEcommerceRequest([
     *         'currencyCode' => 'USD',
     *         'id' => 'example_store',
     *         'listId' => '1a2df69511',
     *         'name' => "Freddie's Cat Hat Emporium",
     *     ]),
     * );
     * ```
     *
     * @param CreateStoreEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceStore
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createStore(CreateStoreEcommerceRequest $request, ?array $options = null): ?ECommerceStore
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores",
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
                return ECommerceStore::fromJson($json);
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
     * Get information about a specific store.
     *
     * Example:
     * ```php
     * $client->ecommerce->getStore(
     *     'store_id',
     *     new GetStoreEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param GetStoreEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceStore
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getStore(string $storeId, GetStoreEcommerceRequest $request = new GetStoreEcommerceRequest(), ?array $options = null): ?ECommerceStore
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
                    path: "3.0/ecommerce/stores/{$storeId}",
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
                return ECommerceStore::fromJson($json);
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
     * Delete a store. Deleting a store will also delete any associated subresources, including Customers, Orders, Products, and Carts.
     *
     * Example:
     * ```php
     * $client->ecommerce->deleteStore(
     *     'store_id',
     * );
     * ```
     *
     * @param string $storeId The store id.
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
    public function deleteStore(string $storeId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}",
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
     * Update a store.
     *
     * Example:
     * ```php
     * $client->ecommerce->updateStore(
     *     'store_id',
     *     new UpdateStoreEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param UpdateStoreEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceStore
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateStore(string $storeId, UpdateStoreEcommerceRequest $request = new UpdateStoreEcommerceRequest(), ?array $options = null): ?ECommerceStore
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}",
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
                return ECommerceStore::fromJson($json);
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
     * Get information about a store's carts.
     *
     * Example:
     * ```php
     * $client->ecommerce->listStoreCarts(
     *     'store_id',
     *     new ListStoreCartsEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param ListStoreCartsEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ECommerceCart>
     */
    public function listStoreCarts(string $storeId, ListStoreCartsEcommerceRequest $request = new ListStoreCartsEcommerceRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListStoreCartsEcommerceRequest $request) => $this->_listStoreCarts($storeId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListStoreCartsEcommerceRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListStoreCartsEcommerceRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListStoreCartsEcommerceResponse $response) => $response?->carts ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a new cart to a store.
     *
     * Example:
     * ```php
     * $client->ecommerce->createStoreCart(
     *     'store_id',
     *     new CreateStoreCartEcommerceRequest([
     *         'currencyCode' => 'currency_code',
     *         'customer' => new EcommerceStoresCartsPost([
     *             'id' => 'id',
     *         ]),
     *         'id' => 'id',
     *         'lines' => [
     *             new CreateStoreCartEcommerceRequestLinesItem([
     *                 'id' => 'id',
     *                 'price' => 1.1,
     *                 'productId' => 'product_id',
     *                 'productVariantId' => 'product_variant_id',
     *                 'quantity' => 1,
     *             ]),
     *         ],
     *         'orderTotal' => 1.1,
     *     ]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param CreateStoreCartEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceCart
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createStoreCart(string $storeId, CreateStoreCartEcommerceRequest $request, ?array $options = null): ?ECommerceCart
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/carts",
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
                return ECommerceCart::fromJson($json);
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
     * Get information about a specific cart.
     *
     * Example:
     * ```php
     * $client->ecommerce->getStoreCart(
     *     'store_id',
     *     'cart_id',
     *     new GetStoreCartEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $cartId The id for the cart.
     * @param GetStoreCartEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceCart
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getStoreCart(string $storeId, string $cartId, GetStoreCartEcommerceRequest $request = new GetStoreCartEcommerceRequest(), ?array $options = null): ?ECommerceCart
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
                    path: "3.0/ecommerce/stores/{$storeId}/carts/{$cartId}",
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
                return ECommerceCart::fromJson($json);
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
     * Delete a cart.
     *
     * Example:
     * ```php
     * $client->ecommerce->deleteStoreCart(
     *     'store_id',
     *     'cart_id',
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $cartId The id for the cart.
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
    public function deleteStoreCart(string $storeId, string $cartId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/carts/{$cartId}",
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
     * Update a specific cart.
     *
     * Example:
     * ```php
     * $client->ecommerce->updateStoreCart(
     *     'store_id',
     *     'cart_id',
     *     new UpdateStoreCartEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $cartId The id for the cart.
     * @param UpdateStoreCartEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceCart
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateStoreCart(string $storeId, string $cartId, UpdateStoreCartEcommerceRequest $request = new UpdateStoreCartEcommerceRequest(), ?array $options = null): ?ECommerceCart
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/carts/{$cartId}",
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
                return ECommerceCart::fromJson($json);
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
     * Get information about a cart's line items.
     *
     * Example:
     * ```php
     * $client->ecommerce->listStoreCartLines(
     *     'store_id',
     *     'cart_id',
     *     new ListStoreCartLinesEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $cartId The id for the cart.
     * @param ListStoreCartLinesEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ECommerceCartLineItem>
     */
    public function listStoreCartLines(string $storeId, string $cartId, ListStoreCartLinesEcommerceRequest $request = new ListStoreCartLinesEcommerceRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListStoreCartLinesEcommerceRequest $request) => $this->_listStoreCartLines($storeId, $cartId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListStoreCartLinesEcommerceRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListStoreCartLinesEcommerceRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListStoreCartLinesEcommerceResponse $response) => $response?->lines ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a new line item to an existing cart.
     *
     * Example:
     * ```php
     * $client->ecommerce->createStoreCartLine(
     *     'store_id',
     *     'cart_id',
     *     new CreateStoreCartLineEcommerceRequest([
     *         'id' => 'id',
     *         'price' => 1.1,
     *         'productId' => 'product_id',
     *         'productVariantId' => 'product_variant_id',
     *         'quantity' => 1,
     *     ]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $cartId The id for the cart.
     * @param CreateStoreCartLineEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceCartLineItem
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createStoreCartLine(string $storeId, string $cartId, CreateStoreCartLineEcommerceRequest $request, ?array $options = null): ?ECommerceCartLineItem
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/carts/{$cartId}/lines",
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
                return ECommerceCartLineItem::fromJson($json);
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
     * Get information about a specific cart line item.
     *
     * Example:
     * ```php
     * $client->ecommerce->getStoreCartLine(
     *     'store_id',
     *     'cart_id',
     *     'line_id',
     *     new GetStoreCartLineEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $cartId The id for the cart.
     * @param string $lineId The id for the line item of a cart.
     * @param GetStoreCartLineEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceCartLineItem
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getStoreCartLine(string $storeId, string $cartId, string $lineId, GetStoreCartLineEcommerceRequest $request = new GetStoreCartLineEcommerceRequest(), ?array $options = null): ?ECommerceCartLineItem
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
                    path: "3.0/ecommerce/stores/{$storeId}/carts/{$cartId}/lines/{$lineId}",
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
                return ECommerceCartLineItem::fromJson($json);
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
     * Delete a specific cart line item.
     *
     * Example:
     * ```php
     * $client->ecommerce->deleteStoreCartLine(
     *     'store_id',
     *     'cart_id',
     *     'line_id',
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $cartId The id for the cart.
     * @param string $lineId The id for the line item of a cart.
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
    public function deleteStoreCartLine(string $storeId, string $cartId, string $lineId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/carts/{$cartId}/lines/{$lineId}",
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
     * Update a specific cart line item.
     *
     * Example:
     * ```php
     * $client->ecommerce->updateStoreCartLine(
     *     'store_id',
     *     'cart_id',
     *     'line_id',
     *     new UpdateStoreCartLineEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $cartId The id for the cart.
     * @param string $lineId The id for the line item of a cart.
     * @param UpdateStoreCartLineEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceCartLineItem
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateStoreCartLine(string $storeId, string $cartId, string $lineId, UpdateStoreCartLineEcommerceRequest $request = new UpdateStoreCartLineEcommerceRequest(), ?array $options = null): ?ECommerceCartLineItem
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/carts/{$cartId}/lines/{$lineId}",
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
                return ECommerceCartLineItem::fromJson($json);
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
     * Get information about a store's customers.
     *
     * Example:
     * ```php
     * $client->ecommerce->listStoreCustomers(
     *     'store_id',
     *     new ListStoreCustomersEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param ListStoreCustomersEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ECommerceCustomer>
     */
    public function listStoreCustomers(string $storeId, ListStoreCustomersEcommerceRequest $request = new ListStoreCustomersEcommerceRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListStoreCustomersEcommerceRequest $request) => $this->_listStoreCustomers($storeId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListStoreCustomersEcommerceRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListStoreCustomersEcommerceRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListStoreCustomersEcommerceResponse $response) => $response?->customers ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a new customer to a store.
     *
     * Example:
     * ```php
     * $client->ecommerce->createStoreCustomer(
     *     'store_id',
     *     new CreateStoreCustomerEcommerceRequest([
     *         'id' => 'id',
     *         'optInStatus' => true,
     *     ]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param CreateStoreCustomerEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceCustomer
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createStoreCustomer(string $storeId, CreateStoreCustomerEcommerceRequest $request, ?array $options = null): ?ECommerceCustomer
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/customers",
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
                return ECommerceCustomer::fromJson($json);
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
     * Get information about a specific customer.
     *
     * Example:
     * ```php
     * $client->ecommerce->getStoreCustomer(
     *     'store_id',
     *     'customer_id',
     *     new GetStoreCustomerEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $customerId The id for the customer of a store.
     * @param GetStoreCustomerEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceCustomer
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getStoreCustomer(string $storeId, string $customerId, GetStoreCustomerEcommerceRequest $request = new GetStoreCustomerEcommerceRequest(), ?array $options = null): ?ECommerceCustomer
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
                    path: "3.0/ecommerce/stores/{$storeId}/customers/{$customerId}",
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
                return ECommerceCustomer::fromJson($json);
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
     * Add or update a customer.
     *
     * Example:
     * ```php
     * $client->ecommerce->upsertStoreCustomer(
     *     'store_id',
     *     'customer_id',
     *     new UpsertStoreCustomerEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $customerId The id for the customer of a store.
     * @param UpsertStoreCustomerEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceCustomer
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function upsertStoreCustomer(string $storeId, string $customerId, UpsertStoreCustomerEcommerceRequest $request = new UpsertStoreCustomerEcommerceRequest(), ?array $options = null): ?ECommerceCustomer
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/customers/{$customerId}",
                    method: HttpMethod::PUT,
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
                return ECommerceCustomer::fromJson($json);
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
     * Delete a customer from a store.
     *
     * Example:
     * ```php
     * $client->ecommerce->deleteStoreCustomer(
     *     'store_id',
     *     'customer_id',
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $customerId The id for the customer of a store.
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
    public function deleteStoreCustomer(string $storeId, string $customerId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/customers/{$customerId}",
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
     * Update a customer.
     *
     * Example:
     * ```php
     * $client->ecommerce->updateStoreCustomer(
     *     'store_id',
     *     'customer_id',
     *     new UpdateStoreCustomerEcommerceRequest([
     *         'body' => new EcommerceStoresCartsPatch([]),
     *     ]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $customerId The id for the customer of a store.
     * @param UpdateStoreCustomerEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceCustomer
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateStoreCustomer(string $storeId, string $customerId, UpdateStoreCustomerEcommerceRequest $request, ?array $options = null): ?ECommerceCustomer
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/customers/{$customerId}",
                    method: HttpMethod::PATCH,
                    body: $request->body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ECommerceCustomer::fromJson($json);
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
     * Get information about a store's orders.
     *
     * Example:
     * ```php
     * $client->ecommerce->listStoreOrders(
     *     'store_id',
     *     new ListStoreOrdersEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param ListStoreOrdersEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ECommerceOrder>
     */
    public function listStoreOrders(string $storeId, ListStoreOrdersEcommerceRequest $request = new ListStoreOrdersEcommerceRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListStoreOrdersEcommerceRequest $request) => $this->_listStoreOrders($storeId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListStoreOrdersEcommerceRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListStoreOrdersEcommerceRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListStoreOrdersEcommerceResponse $response) => $response?->orders ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a new order to a store.
     *
     * Example:
     * ```php
     * $client->ecommerce->createStoreOrder(
     *     'store_id',
     *     new CreateStoreOrderEcommerceRequest([
     *         'currencyCode' => 'currency_code',
     *         'customer' => new EcommerceStoresCartsPost([
     *             'id' => 'id',
     *         ]),
     *         'id' => 'id',
     *         'lines' => [
     *             new CreateStoreOrderEcommerceRequestLinesItem([
     *                 'id' => 'id',
     *                 'price' => 1.1,
     *                 'productId' => 'product_id',
     *                 'productVariantId' => 'product_variant_id',
     *                 'quantity' => 1,
     *             ]),
     *         ],
     *         'orderTotal' => 1.1,
     *     ]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param CreateStoreOrderEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceOrder
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createStoreOrder(string $storeId, CreateStoreOrderEcommerceRequest $request, ?array $options = null): ?ECommerceOrder
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/orders",
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
                return ECommerceOrder::fromJson($json);
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
     * Get information about a specific order.
     *
     * Example:
     * ```php
     * $client->ecommerce->getStoreOrder(
     *     'store_id',
     *     'order_id',
     *     new GetStoreOrderEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $orderId The id for the order in a store.
     * @param GetStoreOrderEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceOrder
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getStoreOrder(string $storeId, string $orderId, GetStoreOrderEcommerceRequest $request = new GetStoreOrderEcommerceRequest(), ?array $options = null): ?ECommerceOrder
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
                    path: "3.0/ecommerce/stores/{$storeId}/orders/{$orderId}",
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
                return ECommerceOrder::fromJson($json);
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
     * Delete an order.
     *
     * Example:
     * ```php
     * $client->ecommerce->deleteStoreOrder(
     *     'store_id',
     *     'order_id',
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $orderId The id for the order in a store.
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
    public function deleteStoreOrder(string $storeId, string $orderId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/orders/{$orderId}",
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
     * Update a specific order.
     *
     * Example:
     * ```php
     * $client->ecommerce->updateStoreOrder(
     *     'store_id',
     *     'order_id',
     *     new UpdateStoreOrderEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $orderId The id for the order in a store.
     * @param UpdateStoreOrderEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceOrder
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateStoreOrder(string $storeId, string $orderId, UpdateStoreOrderEcommerceRequest $request = new UpdateStoreOrderEcommerceRequest(), ?array $options = null): ?ECommerceOrder
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/orders/{$orderId}",
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
                return ECommerceOrder::fromJson($json);
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
     * Get information about an order's line items.
     *
     * Example:
     * ```php
     * $client->ecommerce->listStoreOrderLines(
     *     'store_id',
     *     'order_id',
     *     new ListStoreOrderLinesEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $orderId The id for the order in a store.
     * @param ListStoreOrderLinesEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ECommerceOrderLineItem>
     */
    public function listStoreOrderLines(string $storeId, string $orderId, ListStoreOrderLinesEcommerceRequest $request = new ListStoreOrderLinesEcommerceRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListStoreOrderLinesEcommerceRequest $request) => $this->_listStoreOrderLines($storeId, $orderId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListStoreOrderLinesEcommerceRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListStoreOrderLinesEcommerceRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListStoreOrderLinesEcommerceResponse $response) => $response?->lines ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a new line item to an existing order.
     *
     * Example:
     * ```php
     * $client->ecommerce->createStoreOrderLine(
     *     'store_id',
     *     'order_id',
     *     new CreateStoreOrderLineEcommerceRequest([
     *         'id' => 'id',
     *         'price' => 1.1,
     *         'productId' => 'product_id',
     *         'productVariantId' => 'product_variant_id',
     *         'quantity' => 1,
     *     ]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $orderId The id for the order in a store.
     * @param CreateStoreOrderLineEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceOrderLineItem
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createStoreOrderLine(string $storeId, string $orderId, CreateStoreOrderLineEcommerceRequest $request, ?array $options = null): ?ECommerceOrderLineItem
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/orders/{$orderId}/lines",
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
                return ECommerceOrderLineItem::fromJson($json);
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
     * Get information about a specific order line item.
     *
     * Example:
     * ```php
     * $client->ecommerce->getStoreOrderLine(
     *     'store_id',
     *     'order_id',
     *     'line_id',
     *     new GetStoreOrderLineEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $orderId The id for the order in a store.
     * @param string $lineId The id for the line item of an order.
     * @param GetStoreOrderLineEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceOrderLineItem
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getStoreOrderLine(string $storeId, string $orderId, string $lineId, GetStoreOrderLineEcommerceRequest $request = new GetStoreOrderLineEcommerceRequest(), ?array $options = null): ?ECommerceOrderLineItem
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
                    path: "3.0/ecommerce/stores/{$storeId}/orders/{$orderId}/lines/{$lineId}",
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
                return ECommerceOrderLineItem::fromJson($json);
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
     * Delete a specific order line item.
     *
     * Example:
     * ```php
     * $client->ecommerce->deleteStoreOrderLine(
     *     'store_id',
     *     'order_id',
     *     'line_id',
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $orderId The id for the order in a store.
     * @param string $lineId The id for the line item of an order.
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
    public function deleteStoreOrderLine(string $storeId, string $orderId, string $lineId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/orders/{$orderId}/lines/{$lineId}",
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
     * Update a specific order line item.
     *
     * Example:
     * ```php
     * $client->ecommerce->updateStoreOrderLine(
     *     'store_id',
     *     'order_id',
     *     'line_id',
     *     new UpdateStoreOrderLineEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $orderId The id for the order in a store.
     * @param string $lineId The id for the line item of an order.
     * @param UpdateStoreOrderLineEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceOrderLineItem
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateStoreOrderLine(string $storeId, string $orderId, string $lineId, UpdateStoreOrderLineEcommerceRequest $request = new UpdateStoreOrderLineEcommerceRequest(), ?array $options = null): ?ECommerceOrderLineItem
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/orders/{$orderId}/lines/{$lineId}",
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
                return ECommerceOrderLineItem::fromJson($json);
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
     * Get information about a store's products.
     *
     * Example:
     * ```php
     * $client->ecommerce->listStoreProducts(
     *     'store_id',
     *     new ListStoreProductsEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param ListStoreProductsEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ECommerceProduct>
     */
    public function listStoreProducts(string $storeId, ListStoreProductsEcommerceRequest $request = new ListStoreProductsEcommerceRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListStoreProductsEcommerceRequest $request) => $this->_listStoreProducts($storeId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListStoreProductsEcommerceRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListStoreProductsEcommerceRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListStoreProductsEcommerceResponse $response) => $response?->products ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a new product to a store.
     *
     * Example:
     * ```php
     * $client->ecommerce->createStoreProduct(
     *     'store_id',
     *     new CreateStoreProductEcommerceRequest([
     *         'body' => new EcommerceStoresOrdersPost([
     *             'id' => 'id',
     *             'title' => 'Cat Hat',
     *             'variants' => [
     *                 new EcommerceStoresOrdersPostVariantsItem([
     *                     'id' => 'id',
     *                     'title' => 'Cat Hat',
     *                 ]),
     *             ],
     *         ]),
     *     ]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param CreateStoreProductEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceProduct
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createStoreProduct(string $storeId, CreateStoreProductEcommerceRequest $request, ?array $options = null): ?ECommerceProduct
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/products",
                    method: HttpMethod::POST,
                    body: $request->body,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ECommerceProduct::fromJson($json);
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
     * Get information about a specific product.
     *
     * Example:
     * ```php
     * $client->ecommerce->getStoreProduct(
     *     'store_id',
     *     'product_id',
     *     new GetStoreProductEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param GetStoreProductEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceProduct
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getStoreProduct(string $storeId, string $productId, GetStoreProductEcommerceRequest $request = new GetStoreProductEcommerceRequest(), ?array $options = null): ?ECommerceProduct
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
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}",
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
                return ECommerceProduct::fromJson($json);
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
     * Update a specific product.
     *
     * Example:
     * ```php
     * $client->ecommerce->upsertStoreProduct(
     *     'store_id',
     *     'product_id',
     *     new UpsertStoreProductEcommerceRequest([
     *         'id' => 'id',
     *     ]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param UpsertStoreProductEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceProduct
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function upsertStoreProduct(string $storeId, string $productId, UpsertStoreProductEcommerceRequest $request, ?array $options = null): ?ECommerceProduct
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}",
                    method: HttpMethod::PUT,
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
                return ECommerceProduct::fromJson($json);
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
     * Delete a product.
     *
     * Example:
     * ```php
     * $client->ecommerce->deleteStoreProduct(
     *     'store_id',
     *     'product_id',
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
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
    public function deleteStoreProduct(string $storeId, string $productId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}",
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
     * Update a specific product.
     *
     * Example:
     * ```php
     * $client->ecommerce->updateStoreProduct(
     *     'store_id',
     *     'product_id',
     *     new UpdateStoreProductEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param UpdateStoreProductEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceProduct
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateStoreProduct(string $storeId, string $productId, UpdateStoreProductEcommerceRequest $request = new UpdateStoreProductEcommerceRequest(), ?array $options = null): ?ECommerceProduct
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}",
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
                return ECommerceProduct::fromJson($json);
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
     * Get information about a product's images.
     *
     * Example:
     * ```php
     * $client->ecommerce->listStoreProductImages(
     *     'store_id',
     *     'product_id',
     *     new ListStoreProductImagesEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param ListStoreProductImagesEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ListStoreProductImagesEcommerceResponseImagesItem>
     */
    public function listStoreProductImages(string $storeId, string $productId, ListStoreProductImagesEcommerceRequest $request = new ListStoreProductImagesEcommerceRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListStoreProductImagesEcommerceRequest $request) => $this->_listStoreProductImages($storeId, $productId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListStoreProductImagesEcommerceRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListStoreProductImagesEcommerceRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListStoreProductImagesEcommerceResponse $response) => $response?->images ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a new image to the product.
     *
     * Example:
     * ```php
     * $client->ecommerce->createStoreProductImage(
     *     'store_id',
     *     'product_id',
     *     new CreateStoreProductImageEcommerceRequest([
     *         'id' => 'id',
     *         'url' => 'url',
     *     ]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param CreateStoreProductImageEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateStoreProductImageEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createStoreProductImage(string $storeId, string $productId, CreateStoreProductImageEcommerceRequest $request, ?array $options = null): ?CreateStoreProductImageEcommerceResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}/images",
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
                return CreateStoreProductImageEcommerceResponse::fromJson($json);
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
     * Get information about a specific product image.
     *
     * Example:
     * ```php
     * $client->ecommerce->getStoreProductImage(
     *     'store_id',
     *     'product_id',
     *     'image_id',
     *     new GetStoreProductImageEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param string $imageId The id for the product image.
     * @param GetStoreProductImageEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetStoreProductImageEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getStoreProductImage(string $storeId, string $productId, string $imageId, GetStoreProductImageEcommerceRequest $request = new GetStoreProductImageEcommerceRequest(), ?array $options = null): ?GetStoreProductImageEcommerceResponse
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
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}/images/{$imageId}",
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
                return GetStoreProductImageEcommerceResponse::fromJson($json);
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
     * Delete a product image.
     *
     * Example:
     * ```php
     * $client->ecommerce->deleteStoreProductImage(
     *     'store_id',
     *     'product_id',
     *     'image_id',
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param string $imageId The id for the product image.
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
    public function deleteStoreProductImage(string $storeId, string $productId, string $imageId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}/images/{$imageId}",
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
     * Update a product image.
     *
     * Example:
     * ```php
     * $client->ecommerce->updateStoreProductImage(
     *     'store_id',
     *     'product_id',
     *     'image_id',
     *     new UpdateStoreProductImageEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param string $imageId The id for the product image.
     * @param UpdateStoreProductImageEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateStoreProductImageEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateStoreProductImage(string $storeId, string $productId, string $imageId, UpdateStoreProductImageEcommerceRequest $request = new UpdateStoreProductImageEcommerceRequest(), ?array $options = null): ?UpdateStoreProductImageEcommerceResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}/images/{$imageId}",
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
                return UpdateStoreProductImageEcommerceResponse::fromJson($json);
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
     * Get information about a product's variants.
     *
     * Example:
     * ```php
     * $client->ecommerce->listStoreProductVariants(
     *     'store_id',
     *     'product_id',
     *     new ListStoreProductVariantsEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param ListStoreProductVariantsEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ECommerceProductVariant>
     */
    public function listStoreProductVariants(string $storeId, string $productId, ListStoreProductVariantsEcommerceRequest $request = new ListStoreProductVariantsEcommerceRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListStoreProductVariantsEcommerceRequest $request) => $this->_listStoreProductVariants($storeId, $productId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListStoreProductVariantsEcommerceRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListStoreProductVariantsEcommerceRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListStoreProductVariantsEcommerceResponse $response) => $response?->variants ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a new variant to the product.
     *
     * Example:
     * ```php
     * $client->ecommerce->createStoreProductVariant(
     *     'store_id',
     *     'product_id',
     *     new CreateStoreProductVariantEcommerceRequest([
     *         'id' => 'id',
     *         'title' => 'Cat Hat',
     *     ]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param CreateStoreProductVariantEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceProductVariant
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createStoreProductVariant(string $storeId, string $productId, CreateStoreProductVariantEcommerceRequest $request, ?array $options = null): ?ECommerceProductVariant
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}/variants",
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
                return ECommerceProductVariant::fromJson($json);
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
     * Get information about a specific product variant.
     *
     * Example:
     * ```php
     * $client->ecommerce->getStoreProductVariant(
     *     'store_id',
     *     'product_id',
     *     'variant_id',
     *     new GetStoreProductVariantEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param string $variantId The id for the product variant.
     * @param GetStoreProductVariantEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceProductVariant
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getStoreProductVariant(string $storeId, string $productId, string $variantId, GetStoreProductVariantEcommerceRequest $request = new GetStoreProductVariantEcommerceRequest(), ?array $options = null): ?ECommerceProductVariant
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
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}/variants/{$variantId}",
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
                return ECommerceProductVariant::fromJson($json);
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
     * Add or update a product variant.
     *
     * Example:
     * ```php
     * $client->ecommerce->upsertStoreProductVariant(
     *     'store_id',
     *     'product_id',
     *     'variant_id',
     *     new UpsertStoreProductVariantEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param string $variantId The id for the product variant.
     * @param UpsertStoreProductVariantEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceProductVariant
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function upsertStoreProductVariant(string $storeId, string $productId, string $variantId, UpsertStoreProductVariantEcommerceRequest $request = new UpsertStoreProductVariantEcommerceRequest(), ?array $options = null): ?ECommerceProductVariant
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}/variants/{$variantId}",
                    method: HttpMethod::PUT,
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
                return ECommerceProductVariant::fromJson($json);
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
     * Delete a product variant.
     *
     * Example:
     * ```php
     * $client->ecommerce->deleteStoreProductVariant(
     *     'store_id',
     *     'product_id',
     *     'variant_id',
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param string $variantId The id for the product variant.
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
    public function deleteStoreProductVariant(string $storeId, string $productId, string $variantId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}/variants/{$variantId}",
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
     * Update a product variant.
     *
     * Example:
     * ```php
     * $client->ecommerce->updateStoreProductVariant(
     *     'store_id',
     *     'product_id',
     *     'variant_id',
     *     new UpdateStoreProductVariantEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param string $variantId The id for the product variant.
     * @param UpdateStoreProductVariantEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommerceProductVariant
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateStoreProductVariant(string $storeId, string $productId, string $variantId, UpdateStoreProductVariantEcommerceRequest $request = new UpdateStoreProductVariantEcommerceRequest(), ?array $options = null): ?ECommerceProductVariant
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}/variants/{$variantId}",
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
                return ECommerceProductVariant::fromJson($json);
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
     * Get information about a store's promo rules.
     *
     * Example:
     * ```php
     * $client->ecommerce->listStorePromoRules(
     *     'store_id',
     *     new ListStorePromoRulesEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param ListStorePromoRulesEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ECommercePromoRule>
     */
    public function listStorePromoRules(string $storeId, ListStorePromoRulesEcommerceRequest $request = new ListStorePromoRulesEcommerceRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListStorePromoRulesEcommerceRequest $request) => $this->_listStorePromoRules($storeId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListStorePromoRulesEcommerceRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListStorePromoRulesEcommerceRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListStorePromoRulesEcommerceResponse $response) => $response?->promoRules ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a new promo rule to a store.
     *
     * Example:
     * ```php
     * $client->ecommerce->createStorePromoRule(
     *     'store_id',
     *     new CreateStorePromoRuleEcommerceRequest([
     *         'amount' => 1.1,
     *         'description' => 'Save BIG during our summer sale!',
     *         'id' => 'id',
     *         'target' => CreateStorePromoRuleEcommerceRequestTarget::PerItem->value,
     *         'type' => CreateStorePromoRuleEcommerceRequestType::Fixed->value,
     *     ]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param CreateStorePromoRuleEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommercePromoRule
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createStorePromoRule(string $storeId, CreateStorePromoRuleEcommerceRequest $request, ?array $options = null): ?ECommercePromoRule
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/promo-rules",
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
                return ECommercePromoRule::fromJson($json);
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
     * Get information about a specific promo rule.
     *
     * Example:
     * ```php
     * $client->ecommerce->getStorePromoRule(
     *     'store_id',
     *     'promo_rule_id',
     *     new GetStorePromoRuleEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $promoRuleId The id for the promo rule of a store.
     * @param GetStorePromoRuleEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommercePromoRule
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getStorePromoRule(string $storeId, string $promoRuleId, GetStorePromoRuleEcommerceRequest $request = new GetStorePromoRuleEcommerceRequest(), ?array $options = null): ?ECommercePromoRule
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
                    path: "3.0/ecommerce/stores/{$storeId}/promo-rules/{$promoRuleId}",
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
                return ECommercePromoRule::fromJson($json);
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
     * Delete a promo rule from a store.
     *
     * Example:
     * ```php
     * $client->ecommerce->deleteStorePromoRule(
     *     'store_id',
     *     'promo_rule_id',
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $promoRuleId The id for the promo rule of a store.
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
    public function deleteStorePromoRule(string $storeId, string $promoRuleId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/promo-rules/{$promoRuleId}",
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
     * Update a promo rule.
     *
     * Example:
     * ```php
     * $client->ecommerce->updateStorePromoRule(
     *     'store_id',
     *     'promo_rule_id',
     *     new UpdateStorePromoRuleEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $promoRuleId The id for the promo rule of a store.
     * @param UpdateStorePromoRuleEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommercePromoRule
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateStorePromoRule(string $storeId, string $promoRuleId, UpdateStorePromoRuleEcommerceRequest $request = new UpdateStorePromoRuleEcommerceRequest(), ?array $options = null): ?ECommercePromoRule
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/promo-rules/{$promoRuleId}",
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
                return ECommercePromoRule::fromJson($json);
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
     * Get information about a store's promo codes.
     *
     * Example:
     * ```php
     * $client->ecommerce->listStorePromoRulePromoCodes(
     *     'store_id',
     *     'promo_rule_id',
     *     new ListStorePromoRulePromoCodesEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $promoRuleId The id for the promo rule of a store.
     * @param ListStorePromoRulePromoCodesEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ECommercePromoCode>
     */
    public function listStorePromoRulePromoCodes(string $storeId, string $promoRuleId, ListStorePromoRulePromoCodesEcommerceRequest $request = new ListStorePromoRulePromoCodesEcommerceRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListStorePromoRulePromoCodesEcommerceRequest $request) => $this->_listStorePromoRulePromoCodes($storeId, $promoRuleId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListStorePromoRulePromoCodesEcommerceRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListStorePromoRulePromoCodesEcommerceRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListStorePromoRulePromoCodesEcommerceResponse $response) => $response?->promoCodes ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Add a new promo code to a store.
     *
     * Example:
     * ```php
     * $client->ecommerce->createStorePromoRulePromoCode(
     *     'store_id',
     *     'promo_rule_id',
     *     new CreateStorePromoRulePromoCodeEcommerceRequest([
     *         'code' => 'summersale',
     *         'id' => 'id',
     *         'redemptionUrl' => 'A url that applies promo code directly at checkout or a url that points to sale page or store url',
     *     ]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $promoRuleId The id for the promo rule of a store.
     * @param CreateStorePromoRulePromoCodeEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommercePromoCode
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function createStorePromoRulePromoCode(string $storeId, string $promoRuleId, CreateStorePromoRulePromoCodeEcommerceRequest $request, ?array $options = null): ?ECommercePromoCode
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/promo-rules/{$promoRuleId}/promo-codes",
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
                return ECommercePromoCode::fromJson($json);
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
     * Get information about a specific promo code.
     *
     * Example:
     * ```php
     * $client->ecommerce->getStorePromoRulePromoCode(
     *     'store_id',
     *     'promo_rule_id',
     *     'promo_code_id',
     *     new GetStorePromoRulePromoCodeEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $promoRuleId The id for the promo rule of a store.
     * @param string $promoCodeId The id for the promo code of a store.
     * @param GetStorePromoRulePromoCodeEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommercePromoCode
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getStorePromoRulePromoCode(string $storeId, string $promoRuleId, string $promoCodeId, GetStorePromoRulePromoCodeEcommerceRequest $request = new GetStorePromoRulePromoCodeEcommerceRequest(), ?array $options = null): ?ECommercePromoCode
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
                    path: "3.0/ecommerce/stores/{$storeId}/promo-rules/{$promoRuleId}/promo-codes/{$promoCodeId}",
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
                return ECommercePromoCode::fromJson($json);
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
     * Delete a promo code from a store.
     *
     * Example:
     * ```php
     * $client->ecommerce->deleteStorePromoRulePromoCode(
     *     'store_id',
     *     'promo_rule_id',
     *     'promo_code_id',
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $promoRuleId The id for the promo rule of a store.
     * @param string $promoCodeId The id for the promo code of a store.
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
    public function deleteStorePromoRulePromoCode(string $storeId, string $promoRuleId, string $promoCodeId, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/promo-rules/{$promoRuleId}/promo-codes/{$promoCodeId}",
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
     * Update a promo code.
     *
     * Example:
     * ```php
     * $client->ecommerce->updateStorePromoRulePromoCode(
     *     'store_id',
     *     'promo_rule_id',
     *     'promo_code_id',
     *     new UpdateStorePromoRulePromoCodeEcommerceRequest([]),
     * );
     * ```
     *
     * @param string $storeId The store id.
     * @param string $promoRuleId The id for the promo rule of a store.
     * @param string $promoCodeId The id for the promo code of a store.
     * @param UpdateStorePromoRulePromoCodeEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ECommercePromoCode
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function updateStorePromoRulePromoCode(string $storeId, string $promoRuleId, string $promoCodeId, UpdateStorePromoRulePromoCodeEcommerceRequest $request = new UpdateStorePromoRulePromoCodeEcommerceRequest(), ?array $options = null): ?ECommercePromoCode
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/promo-rules/{$promoRuleId}/promo-codes/{$promoCodeId}",
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
                return ECommercePromoCode::fromJson($json);
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
     * Get information about an account's orders.
     *
     * @param ListOrdersEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListOrdersEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listOrders(ListOrdersEcommerceRequest $request = new ListOrdersEcommerceRequest(), ?array $options = null): ?ListOrdersEcommerceResponse
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
        if ($request->campaignId != null) {
            $query['campaign_id'] = $request->campaignId;
        }
        if ($request->outreachId != null) {
            $query['outreach_id'] = $request->outreachId;
        }
        if ($request->customerId != null) {
            $query['customer_id'] = $request->customerId;
        }
        if ($request->hasOutreach != null) {
            $query['has_outreach'] = $request->hasOutreach;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/orders",
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
                return ListOrdersEcommerceResponse::fromJson($json);
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
     * Get information about all stores in the account.
     *
     * @param ListStoresEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListStoresEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listStores(ListStoresEcommerceRequest $request = new ListStoresEcommerceRequest(), ?array $options = null): ?ListStoresEcommerceResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores",
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
                return ListStoresEcommerceResponse::fromJson($json);
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
     * Get information about a store's carts.
     *
     * @param string $storeId The store id.
     * @param ListStoreCartsEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListStoreCartsEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listStoreCarts(string $storeId, ListStoreCartsEcommerceRequest $request = new ListStoreCartsEcommerceRequest(), ?array $options = null): ?ListStoreCartsEcommerceResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/carts",
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
                return ListStoreCartsEcommerceResponse::fromJson($json);
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
     * Get information about a cart's line items.
     *
     * @param string $storeId The store id.
     * @param string $cartId The id for the cart.
     * @param ListStoreCartLinesEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListStoreCartLinesEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listStoreCartLines(string $storeId, string $cartId, ListStoreCartLinesEcommerceRequest $request = new ListStoreCartLinesEcommerceRequest(), ?array $options = null): ?ListStoreCartLinesEcommerceResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/carts/{$cartId}/lines",
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
                return ListStoreCartLinesEcommerceResponse::fromJson($json);
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
     * Get information about a store's customers.
     *
     * @param string $storeId The store id.
     * @param ListStoreCustomersEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListStoreCustomersEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listStoreCustomers(string $storeId, ListStoreCustomersEcommerceRequest $request = new ListStoreCustomersEcommerceRequest(), ?array $options = null): ?ListStoreCustomersEcommerceResponse
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
        if ($request->emailAddress != null) {
            $query['email_address'] = $request->emailAddress;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/customers",
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
                return ListStoreCustomersEcommerceResponse::fromJson($json);
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
     * Get information about a store's orders.
     *
     * @param string $storeId The store id.
     * @param ListStoreOrdersEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListStoreOrdersEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listStoreOrders(string $storeId, ListStoreOrdersEcommerceRequest $request = new ListStoreOrdersEcommerceRequest(), ?array $options = null): ?ListStoreOrdersEcommerceResponse
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
        if ($request->customerId != null) {
            $query['customer_id'] = $request->customerId;
        }
        if ($request->hasOutreach != null) {
            $query['has_outreach'] = $request->hasOutreach;
        }
        if ($request->campaignId != null) {
            $query['campaign_id'] = $request->campaignId;
        }
        if ($request->outreachId != null) {
            $query['outreach_id'] = $request->outreachId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/orders",
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
                return ListStoreOrdersEcommerceResponse::fromJson($json);
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
     * Get information about an order's line items.
     *
     * @param string $storeId The store id.
     * @param string $orderId The id for the order in a store.
     * @param ListStoreOrderLinesEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListStoreOrderLinesEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listStoreOrderLines(string $storeId, string $orderId, ListStoreOrderLinesEcommerceRequest $request = new ListStoreOrderLinesEcommerceRequest(), ?array $options = null): ?ListStoreOrderLinesEcommerceResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/orders/{$orderId}/lines",
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
                return ListStoreOrderLinesEcommerceResponse::fromJson($json);
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
     * Get information about a store's products.
     *
     * @param string $storeId The store id.
     * @param ListStoreProductsEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListStoreProductsEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listStoreProducts(string $storeId, ListStoreProductsEcommerceRequest $request = new ListStoreProductsEcommerceRequest(), ?array $options = null): ?ListStoreProductsEcommerceResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/products",
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
                return ListStoreProductsEcommerceResponse::fromJson($json);
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
     * Get information about a product's images.
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param ListStoreProductImagesEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListStoreProductImagesEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listStoreProductImages(string $storeId, string $productId, ListStoreProductImagesEcommerceRequest $request = new ListStoreProductImagesEcommerceRequest(), ?array $options = null): ?ListStoreProductImagesEcommerceResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}/images",
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
                return ListStoreProductImagesEcommerceResponse::fromJson($json);
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
     * Get information about a product's variants.
     *
     * @param string $storeId The store id.
     * @param string $productId The id for the product of a store.
     * @param ListStoreProductVariantsEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListStoreProductVariantsEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listStoreProductVariants(string $storeId, string $productId, ListStoreProductVariantsEcommerceRequest $request = new ListStoreProductVariantsEcommerceRequest(), ?array $options = null): ?ListStoreProductVariantsEcommerceResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/products/{$productId}/variants",
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
                return ListStoreProductVariantsEcommerceResponse::fromJson($json);
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
     * Get information about a store's promo rules.
     *
     * @param string $storeId The store id.
     * @param ListStorePromoRulesEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListStorePromoRulesEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listStorePromoRules(string $storeId, ListStorePromoRulesEcommerceRequest $request = new ListStorePromoRulesEcommerceRequest(), ?array $options = null): ?ListStorePromoRulesEcommerceResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/promo-rules",
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
                return ListStorePromoRulesEcommerceResponse::fromJson($json);
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
     * Get information about a store's promo codes.
     *
     * @param string $storeId The store id.
     * @param string $promoRuleId The id for the promo rule of a store.
     * @param ListStorePromoRulePromoCodesEcommerceRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListStorePromoRulePromoCodesEcommerceResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listStorePromoRulePromoCodes(string $storeId, string $promoRuleId, ListStorePromoRulePromoCodesEcommerceRequest $request = new ListStorePromoRulePromoCodesEcommerceRequest(), ?array $options = null): ?ListStorePromoRulePromoCodesEcommerceResponse
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
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/ecommerce/stores/{$storeId}/promo-rules/{$promoRuleId}/promo-codes",
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
                return ListStorePromoRulePromoCodesEcommerceResponse::fromJson($json);
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
