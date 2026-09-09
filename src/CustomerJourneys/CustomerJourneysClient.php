<?php

namespace Mailchimp\CustomerJourneys;

use Psr\Http\Client\ClientInterface;
use Mailchimp\Core\Client\RawClient;
use Mailchimp\CustomerJourneys\Requests\CreateJourneyStepActionTriggerCustomerJourneysRequest;
use Mailchimp\Exceptions\MailchimpException;
use Mailchimp\Exceptions\MailchimpApiException;
use Mailchimp\Core\Json\JsonApiRequest;
use Mailchimp\Environments;
use Mailchimp\Core\Client\HttpMethod;
use Psr\Http\Client\ClientExceptionInterface;

class CustomerJourneysClient
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
     * A step trigger in an Automation flow. To use it, create a starting point or step from the Automation flow builder in the app using the Customer Journeys API condition. We’ll provide a url during the process that includes the {journey_id} and {step_id}. You’ll then be able to use this endpoint to trigger the condition for the posted contact.
     *
     * Example:
     * ```php
     * $client->customerJourneys->createJourneyStepActionTrigger(
     *     1,
     *     1,
     *     new CreateJourneyStepActionTriggerCustomerJourneysRequest([
     *         'emailAddress' => 'email_address',
     *     ]),
     * );
     * ```
     *
     * @param int $journeyId The id for the flow.
     * @param int $stepId The id for the Step.
     * @param CreateJourneyStepActionTriggerCustomerJourneysRequest $request
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
    public function createJourneyStepActionTrigger(int $journeyId, int $stepId, CreateJourneyStepActionTriggerCustomerJourneysRequest $request, ?array $options = null): void
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/customer-journeys/journeys/{$journeyId}/steps/{$stepId}/actions/trigger",
                    method: HttpMethod::POST,
                    body: $request,
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
}
