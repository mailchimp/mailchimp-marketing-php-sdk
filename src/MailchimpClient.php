<?php

namespace Mailchimp;

use Mailchimp\Root\RootClient;
use Mailchimp\AccountExports\AccountExportsClient;
use Mailchimp\ActivityFeed\ActivityFeedClient;
use Mailchimp\Audiences\AudiencesClient;
use Mailchimp\AuthorizedApps\AuthorizedAppsClient;
use Mailchimp\Automations\AutomationsClient;
use Mailchimp\BatchWebhooks\BatchWebhooksClient;
use Mailchimp\Batches\BatchesClient;
use Mailchimp\CampaignFolders\CampaignFoldersClient;
use Mailchimp\Campaigns\CampaignsClient;
use Mailchimp\ConnectedSites\ConnectedSitesClient;
use Mailchimp\Conversations\ConversationsClient;
use Mailchimp\CustomerJourneys\CustomerJourneysClient;
use Mailchimp\Ecommerce\EcommerceClient;
use Mailchimp\FacebookAds\FacebookAdsClient;
use Mailchimp\FileManager\FileManagerClient;
use Mailchimp\LandingPages\LandingPagesClient;
use Mailchimp\Lists\ListsClient;
use Mailchimp\Surveys\SurveysClient;
use Mailchimp\Ping\PingClient;
use Mailchimp\Reporting\ReportingClient;
use Mailchimp\Reports\ReportsClient;
use Mailchimp\SearchCampaigns\SearchCampaignsClient;
use Mailchimp\SmsCampaigns\SmsCampaignsClient;
use Mailchimp\SearchMembers\SearchMembersClient;
use Mailchimp\TemplateFolders\TemplateFoldersClient;
use Mailchimp\Templates\TemplatesClient;
use Mailchimp\VerifiedDomains\VerifiedDomainsClient;
use Psr\Http\Client\ClientInterface;
use Mailchimp\Core\Client\RawClient;

class MailchimpClient
{
    /**
     * @var RootClient $root
     */
    public RootClient $root;

    /**
     * @var AccountExportsClient $accountExports
     */
    public AccountExportsClient $accountExports;

    /**
     * @var ActivityFeedClient $activityFeed
     */
    public ActivityFeedClient $activityFeed;

    /**
     * @var AudiencesClient $audiences
     */
    public AudiencesClient $audiences;

    /**
     * @var AuthorizedAppsClient $authorizedApps
     */
    public AuthorizedAppsClient $authorizedApps;

    /**
     * @var AutomationsClient $automations
     */
    public AutomationsClient $automations;

    /**
     * @var BatchWebhooksClient $batchWebhooks
     */
    public BatchWebhooksClient $batchWebhooks;

    /**
     * @var BatchesClient $batches
     */
    public BatchesClient $batches;

    /**
     * @var CampaignFoldersClient $campaignFolders
     */
    public CampaignFoldersClient $campaignFolders;

    /**
     * @var CampaignsClient $campaigns
     */
    public CampaignsClient $campaigns;

    /**
     * @var ConnectedSitesClient $connectedSites
     */
    public ConnectedSitesClient $connectedSites;

    /**
     * @var ConversationsClient $conversations
     */
    public ConversationsClient $conversations;

    /**
     * @var CustomerJourneysClient $customerJourneys
     */
    public CustomerJourneysClient $customerJourneys;

    /**
     * @var EcommerceClient $ecommerce
     */
    public EcommerceClient $ecommerce;

    /**
     * @var FacebookAdsClient $facebookAds
     */
    public FacebookAdsClient $facebookAds;

    /**
     * @var FileManagerClient $fileManager
     */
    public FileManagerClient $fileManager;

    /**
     * @var LandingPagesClient $landingPages
     */
    public LandingPagesClient $landingPages;

    /**
     * @var ListsClient $lists
     */
    public ListsClient $lists;

    /**
     * @var SurveysClient $surveys
     */
    public SurveysClient $surveys;

    /**
     * @var PingClient $ping
     */
    public PingClient $ping;

    /**
     * @var ReportingClient $reporting
     */
    public ReportingClient $reporting;

    /**
     * @var ReportsClient $reports
     */
    public ReportsClient $reports;

    /**
     * @var SearchCampaignsClient $searchCampaigns
     */
    public SearchCampaignsClient $searchCampaigns;

    /**
     * @var SmsCampaignsClient $smsCampaigns
     */
    public SmsCampaignsClient $smsCampaigns;

    /**
     * @var SearchMembersClient $searchMembers
     */
    public SearchMembersClient $searchMembers;

    /**
     * @var TemplateFoldersClient $templateFolders
     */
    public TemplateFoldersClient $templateFolders;

    /**
     * @var TemplatesClient $templates
     */
    public TemplatesClient $templates;

    /**
     * @var VerifiedDomainsClient $verifiedDomains
     */
    public VerifiedDomainsClient $verifiedDomains;

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
     * @param string $token The token to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        string $token,
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'Authorization' => "Bearer $token",
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Mailchimp',
            'X-Fern-SDK-Version' => '0.0.222',
            'User-Agent' => 'mailchimp/marketing-sdk/0.0.222',
        ];

        $this->options = $options ?? [];

        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->root = new RootClient($this->client, $this->options);
        $this->accountExports = new AccountExportsClient($this->client, $this->options);
        $this->activityFeed = new ActivityFeedClient($this->client, $this->options);
        $this->audiences = new AudiencesClient($this->client, $this->options);
        $this->authorizedApps = new AuthorizedAppsClient($this->client, $this->options);
        $this->automations = new AutomationsClient($this->client, $this->options);
        $this->batchWebhooks = new BatchWebhooksClient($this->client, $this->options);
        $this->batches = new BatchesClient($this->client, $this->options);
        $this->campaignFolders = new CampaignFoldersClient($this->client, $this->options);
        $this->campaigns = new CampaignsClient($this->client, $this->options);
        $this->connectedSites = new ConnectedSitesClient($this->client, $this->options);
        $this->conversations = new ConversationsClient($this->client, $this->options);
        $this->customerJourneys = new CustomerJourneysClient($this->client, $this->options);
        $this->ecommerce = new EcommerceClient($this->client, $this->options);
        $this->facebookAds = new FacebookAdsClient($this->client, $this->options);
        $this->fileManager = new FileManagerClient($this->client, $this->options);
        $this->landingPages = new LandingPagesClient($this->client, $this->options);
        $this->lists = new ListsClient($this->client, $this->options);
        $this->surveys = new SurveysClient($this->client, $this->options);
        $this->ping = new PingClient($this->client, $this->options);
        $this->reporting = new ReportingClient($this->client, $this->options);
        $this->reports = new ReportsClient($this->client, $this->options);
        $this->searchCampaigns = new SearchCampaignsClient($this->client, $this->options);
        $this->smsCampaigns = new SmsCampaignsClient($this->client, $this->options);
        $this->searchMembers = new SearchMembersClient($this->client, $this->options);
        $this->templateFolders = new TemplateFoldersClient($this->client, $this->options);
        $this->templates = new TemplatesClient($this->client, $this->options);
        $this->verifiedDomains = new VerifiedDomainsClient($this->client, $this->options);
    }
}
