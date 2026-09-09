<?php

namespace Mailchimp\Reporting;

use Psr\Http\Client\ClientInterface;
use Mailchimp\Core\Client\RawClient;
use Mailchimp\Reporting\Types\ListReportingResponseItem;
use Mailchimp\Exceptions\MailchimpException;
use Mailchimp\Exceptions\MailchimpApiException;
use Mailchimp\Core\Json\JsonApiRequest;
use Mailchimp\Environments;
use Mailchimp\Core\Client\HttpMethod;
use Mailchimp\Core\Json\JsonDecoder;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Mailchimp\Reporting\Requests\ListFacebookAdsReportingRequest;
use Mailchimp\Core\Pagination\Pager;
use Mailchimp\Types\ReportingFacebookAd;
use Mailchimp\Core\Pagination\OffsetPager;
use Mailchimp\Reporting\Types\ListFacebookAdsReportingResponse;
use Mailchimp\Reporting\Requests\GetFacebookAdReportingRequest;
use Mailchimp\Reporting\Requests\ListFacebookAdEcommerceProductActivityReportingRequest;
use Mailchimp\Reporting\Types\ListFacebookAdEcommerceProductActivityReportingResponseProductsItem;
use Mailchimp\Reporting\Types\ListFacebookAdEcommerceProductActivityReportingResponse;
use Mailchimp\Reporting\Requests\ListLandingPagesReportingRequest;
use Mailchimp\Types\LandingPageReport;
use Mailchimp\Reporting\Types\ListLandingPagesReportingResponse;
use Mailchimp\Reporting\Requests\GetLandingPageReportingRequest;
use Mailchimp\Reporting\Requests\ListSurveysReportingRequest;
use Mailchimp\Reporting\Types\ListSurveysReportingResponseSurveysItem;
use Mailchimp\Reporting\Types\ListSurveysReportingResponse;
use Mailchimp\Reporting\Requests\GetSurveyReportingRequest;
use Mailchimp\Reporting\Types\GetSurveyReportingResponse;
use Mailchimp\Reporting\Requests\ListSurveyQuestionsReportingRequest;
use Mailchimp\Reporting\Types\ListSurveyQuestionsReportingResponse;
use Mailchimp\Reporting\Requests\GetSurveyQuestionReportingRequest;
use Mailchimp\Types\SurveyQuestionReport;
use Mailchimp\Reporting\Requests\ListSurveyQuestionAnswersReportingRequest;
use Mailchimp\Reporting\Types\ListSurveyQuestionAnswersReportingResponse;
use Mailchimp\Reporting\Requests\ListSurveyResponsesReportingRequest;
use Mailchimp\Reporting\Types\ListSurveyResponsesReportingResponse;
use Mailchimp\Reporting\Types\GetSurveyResponsReportingResponse;

class ReportingClient
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
     * Get information about the reporting endpoint's resources.
     *
     * Example:
     * ```php
     * $client->reporting->list();
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
     * @return ?array<ListReportingResponseItem>
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
                    path: "3.0/reporting",
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
                return JsonDecoder::decodeArray($json, [ListReportingResponseItem::class]); // @phpstan-ignore-line
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
     * Get reports of Facebook ads.
     *
     * Example:
     * ```php
     * $client->reporting->listFacebookAds(
     *     new ListFacebookAdsReportingRequest([]),
     * );
     * ```
     *
     * @param ListFacebookAdsReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ReportingFacebookAd>
     */
    public function listFacebookAds(ListFacebookAdsReportingRequest $request = new ListFacebookAdsReportingRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListFacebookAdsReportingRequest $request) => $this->_listFacebookAds($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListFacebookAdsReportingRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListFacebookAdsReportingRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListFacebookAdsReportingResponse $response) => $response?->facebookAds ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get report of a Facebook ad.
     *
     * Example:
     * ```php
     * $client->reporting->getFacebookAd(
     *     'outreach_id',
     *     new GetFacebookAdReportingRequest([]),
     * );
     * ```
     *
     * @param string $outreachId The outreach id.
     * @param GetFacebookAdReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ReportingFacebookAd
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getFacebookAd(string $outreachId, GetFacebookAdReportingRequest $request = new GetFacebookAdReportingRequest(), ?array $options = null): ?ReportingFacebookAd
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
                    path: "3.0/reporting/facebook-ads/{$outreachId}",
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
                return ReportingFacebookAd::fromJson($json);
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
     * Get breakdown of product activity for an outreach.
     *
     * Example:
     * ```php
     * $client->reporting->listFacebookAdEcommerceProductActivity(
     *     'outreach_id',
     *     new ListFacebookAdEcommerceProductActivityReportingRequest([]),
     * );
     * ```
     *
     * @param string $outreachId The outreach id.
     * @param ListFacebookAdEcommerceProductActivityReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ListFacebookAdEcommerceProductActivityReportingResponseProductsItem>
     */
    public function listFacebookAdEcommerceProductActivity(string $outreachId, ListFacebookAdEcommerceProductActivityReportingRequest $request = new ListFacebookAdEcommerceProductActivityReportingRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListFacebookAdEcommerceProductActivityReportingRequest $request) => $this->_listFacebookAdEcommerceProductActivity($outreachId, $request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListFacebookAdEcommerceProductActivityReportingRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListFacebookAdEcommerceProductActivityReportingRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListFacebookAdEcommerceProductActivityReportingResponse $response) => $response?->products ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get reports of landing pages.
     *
     * Example:
     * ```php
     * $client->reporting->listLandingPages(
     *     new ListLandingPagesReportingRequest([]),
     * );
     * ```
     *
     * @param ListLandingPagesReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<LandingPageReport>
     */
    public function listLandingPages(ListLandingPagesReportingRequest $request = new ListLandingPagesReportingRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListLandingPagesReportingRequest $request) => $this->_listLandingPages($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListLandingPagesReportingRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListLandingPagesReportingRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListLandingPagesReportingResponse $response) => $response?->landingPages ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get report of a landing page.
     *
     * Example:
     * ```php
     * $client->reporting->getLandingPage(
     *     'outreach_id',
     *     new GetLandingPageReportingRequest([]),
     * );
     * ```
     *
     * @param string $outreachId The outreach id.
     * @param GetLandingPageReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?LandingPageReport
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getLandingPage(string $outreachId, GetLandingPageReportingRequest $request = new GetLandingPageReportingRequest(), ?array $options = null): ?LandingPageReport
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
                    path: "3.0/reporting/landing-pages/{$outreachId}",
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
                return LandingPageReport::fromJson($json);
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
     * Get reports for surveys.
     *
     * Example:
     * ```php
     * $client->reporting->listSurveys(
     *     new ListSurveysReportingRequest([]),
     * );
     * ```
     *
     * @param ListSurveysReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<ListSurveysReportingResponseSurveysItem>
     */
    public function listSurveys(ListSurveysReportingRequest $request = new ListSurveysReportingRequest(), ?array $options = null): Pager
    {
        return new OffsetPager(
            request: $request,
            getNextPage: fn (ListSurveysReportingRequest $request) => $this->_listSurveys($request, $options),
            /* @phpstan-ignore-next-line */
            getOffset: fn (ListSurveysReportingRequest $request) => $request?->offset ?? 0,
            setOffset: function (ListSurveysReportingRequest $request, int $offset) {
                $request->offset = $offset;
            },
            getStep: null,
            /* @phpstan-ignore-next-line */
            getItems: fn (?ListSurveysReportingResponse $response) => $response?->surveys ?? [],
            /* @phpstan-ignore-next-line */
            hasNextPage: null,
        );
    }

    /**
     * Get report for a survey.
     *
     * Example:
     * ```php
     * $client->reporting->getSurvey(
     *     'survey_id',
     *     new GetSurveyReportingRequest([]),
     * );
     * ```
     *
     * @param string $surveyId The ID of the survey.
     * @param GetSurveyReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetSurveyReportingResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getSurvey(string $surveyId, GetSurveyReportingRequest $request = new GetSurveyReportingRequest(), ?array $options = null): ?GetSurveyReportingResponse
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
                    path: "3.0/reporting/surveys/{$surveyId}",
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
                return GetSurveyReportingResponse::fromJson($json);
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
     * Get reports for survey questions.
     *
     * Example:
     * ```php
     * $client->reporting->listSurveyQuestions(
     *     'survey_id',
     *     new ListSurveyQuestionsReportingRequest([]),
     * );
     * ```
     *
     * @param string $surveyId The ID of the survey.
     * @param ListSurveyQuestionsReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSurveyQuestionsReportingResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listSurveyQuestions(string $surveyId, ListSurveyQuestionsReportingRequest $request = new ListSurveyQuestionsReportingRequest(), ?array $options = null): ?ListSurveyQuestionsReportingResponse
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
                    path: "3.0/reporting/surveys/{$surveyId}/questions",
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
                return ListSurveyQuestionsReportingResponse::fromJson($json);
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
     * Get report for a survey question.
     *
     * Example:
     * ```php
     * $client->reporting->getSurveyQuestion(
     *     'survey_id',
     *     'question_id',
     *     new GetSurveyQuestionReportingRequest([]),
     * );
     * ```
     *
     * @param string $surveyId The ID of the survey.
     * @param string $questionId The ID of the survey question.
     * @param GetSurveyQuestionReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?SurveyQuestionReport
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getSurveyQuestion(string $surveyId, string $questionId, GetSurveyQuestionReportingRequest $request = new GetSurveyQuestionReportingRequest(), ?array $options = null): ?SurveyQuestionReport
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
                    path: "3.0/reporting/surveys/{$surveyId}/questions/{$questionId}",
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
                return SurveyQuestionReport::fromJson($json);
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
     * Get answers for a survey question.
     *
     * Example:
     * ```php
     * $client->reporting->listSurveyQuestionAnswers(
     *     'survey_id',
     *     'question_id',
     *     new ListSurveyQuestionAnswersReportingRequest([]),
     * );
     * ```
     *
     * @param string $surveyId The ID of the survey.
     * @param string $questionId The ID of the survey question.
     * @param ListSurveyQuestionAnswersReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSurveyQuestionAnswersReportingResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listSurveyQuestionAnswers(string $surveyId, string $questionId, ListSurveyQuestionAnswersReportingRequest $request = new ListSurveyQuestionAnswersReportingRequest(), ?array $options = null): ?ListSurveyQuestionAnswersReportingResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->respondentFamiliarityIs != null) {
            $query['respondent_familiarity_is'] = $request->respondentFamiliarityIs;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/reporting/surveys/{$surveyId}/questions/{$questionId}/answers",
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
                return ListSurveyQuestionAnswersReportingResponse::fromJson($json);
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
     * Get responses to a survey.
     *
     * Example:
     * ```php
     * $client->reporting->listSurveyResponses(
     *     'survey_id',
     *     new ListSurveyResponsesReportingRequest([]),
     * );
     * ```
     *
     * @param string $surveyId The ID of the survey.
     * @param ListSurveyResponsesReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSurveyResponsesReportingResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function listSurveyResponses(string $surveyId, ListSurveyResponsesReportingRequest $request = new ListSurveyResponsesReportingRequest(), ?array $options = null): ?ListSurveyResponsesReportingResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->fields != null) {
            $query['fields'] = $request->fields;
        }
        if ($request->excludeFields != null) {
            $query['exclude_fields'] = $request->excludeFields;
        }
        if ($request->answeredQuestion != null) {
            $query['answered_question'] = $request->answeredQuestion;
        }
        if ($request->choseAnswer != null) {
            $query['chose_answer'] = $request->choseAnswer;
        }
        if ($request->respondentFamiliarityIs != null) {
            $query['respondent_familiarity_is'] = $request->respondentFamiliarityIs;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/reporting/surveys/{$surveyId}/responses",
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
                return ListSurveyResponsesReportingResponse::fromJson($json);
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
     * Get a single survey response.
     *
     * Example:
     * ```php
     * $client->reporting->getSurveyRespons(
     *     'survey_id',
     *     'response_id',
     * );
     * ```
     *
     * @param string $surveyId The ID of the survey.
     * @param string $responseId The ID of the survey response.
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetSurveyResponsReportingResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    public function getSurveyRespons(string $surveyId, string $responseId, ?array $options = null): ?GetSurveyResponsReportingResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/reporting/surveys/{$surveyId}/responses/{$responseId}",
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
                return GetSurveyResponsReportingResponse::fromJson($json);
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
     * Get reports of Facebook ads.
     *
     * @param ListFacebookAdsReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListFacebookAdsReportingResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listFacebookAds(ListFacebookAdsReportingRequest $request = new ListFacebookAdsReportingRequest(), ?array $options = null): ?ListFacebookAdsReportingResponse
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
                    path: "3.0/reporting/facebook-ads",
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
                return ListFacebookAdsReportingResponse::fromJson($json);
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
     * Get breakdown of product activity for an outreach.
     *
     * @param string $outreachId The outreach id.
     * @param ListFacebookAdEcommerceProductActivityReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListFacebookAdEcommerceProductActivityReportingResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listFacebookAdEcommerceProductActivity(string $outreachId, ListFacebookAdEcommerceProductActivityReportingRequest $request = new ListFacebookAdEcommerceProductActivityReportingRequest(), ?array $options = null): ?ListFacebookAdEcommerceProductActivityReportingResponse
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
        if ($request->sortField != null) {
            $query['sort_field'] = $request->sortField;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "3.0/reporting/facebook-ads/{$outreachId}/ecommerce-product-activity",
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
                return ListFacebookAdEcommerceProductActivityReportingResponse::fromJson($json);
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
     * Get reports of landing pages.
     *
     * @param ListLandingPagesReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListLandingPagesReportingResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listLandingPages(ListLandingPagesReportingRequest $request = new ListLandingPagesReportingRequest(), ?array $options = null): ?ListLandingPagesReportingResponse
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
                    path: "3.0/reporting/landing-pages",
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
                return ListLandingPagesReportingResponse::fromJson($json);
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
     * Get reports for surveys.
     *
     * @param ListSurveysReportingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSurveysReportingResponse
     * @throws MailchimpException
     * @throws MailchimpApiException
     */
    private function _listSurveys(ListSurveysReportingRequest $request = new ListSurveysReportingRequest(), ?array $options = null): ?ListSurveysReportingResponse
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
                    path: "3.0/reporting/surveys",
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
                return ListSurveysReportingResponse::fromJson($json);
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
