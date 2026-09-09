<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * A summary of an individual landing page's settings and content.
 */
class LandingPageReport extends JsonSerializableType
{
    /**
     * @var ?array<LandingPageReportLinksItem> $links A list of link types and descriptions for the API schema documents.
     */
    #[JsonProperty('_links'), ArrayType([LandingPageReportLinksItem::class])]
    public ?array $links;

    /**
     * @var ?int $clicks The number of clicks to this landing pages.
     */
    #[JsonProperty('clicks')]
    public ?int $clicks;

    /**
     * @var ?float $conversionRate The percentage of people who visited your landing page and were added to your list.
     */
    #[JsonProperty('conversion_rate')]
    public ?float $conversionRate;

    /**
     * @var ?LandingPageReportEcommerce $ecommerce
     */
    #[JsonProperty('ecommerce')]
    public ?LandingPageReportEcommerce $ecommerce;

    /**
     * @var ?string $id A string that uniquely identifies this landing page.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $listId The list id connected to this landing page.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?string $listName List Name
     */
    #[JsonProperty('list_name')]
    public ?string $listName;

    /**
     * @var ?string $name The name of this landing page the user will see.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?DateTime $publishedAt The time this landing page was published.
     */
    #[JsonProperty('published_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $publishedAt;

    /**
     * @var ?array<LandingPageReportSignupTagsItem> $signupTags A list of tags associated to the landing page.
     */
    #[JsonProperty('signup_tags'), ArrayType([LandingPageReportSignupTagsItem::class])]
    public ?array $signupTags;

    /**
     * @var ?string $status The status of the landing page.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?int $subscribes The number of subscribes to this landing pages.
     */
    #[JsonProperty('subscribes')]
    public ?int $subscribes;

    /**
     * @var ?LandingPageReportTimeseries $timeseries
     */
    #[JsonProperty('timeseries')]
    public ?LandingPageReportTimeseries $timeseries;

    /**
     * @var ?string $title The name of the landing page the user's customers will see.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?int $uniqueVisits The number of unique visits to this landing pages.
     */
    #[JsonProperty('unique_visits')]
    public ?int $uniqueVisits;

    /**
     * @var ?DateTime $unpublishedAt The time this landing page was unpublished.
     */
    #[JsonProperty('unpublished_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $unpublishedAt;

    /**
     * @var ?string $url The landing page url.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?int $visits The number of visits to this landing pages.
     */
    #[JsonProperty('visits')]
    public ?int $visits;

    /**
     * @var ?int $webId The ID used in the Mailchimp web application.
     */
    #[JsonProperty('web_id')]
    public ?int $webId;

    /**
     * @param array{
     *   links?: ?array<LandingPageReportLinksItem>,
     *   clicks?: ?int,
     *   conversionRate?: ?float,
     *   ecommerce?: ?LandingPageReportEcommerce,
     *   id?: ?string,
     *   listId?: ?string,
     *   listName?: ?string,
     *   name?: ?string,
     *   publishedAt?: ?DateTime,
     *   signupTags?: ?array<LandingPageReportSignupTagsItem>,
     *   status?: ?string,
     *   subscribes?: ?int,
     *   timeseries?: ?LandingPageReportTimeseries,
     *   title?: ?string,
     *   uniqueVisits?: ?int,
     *   unpublishedAt?: ?DateTime,
     *   url?: ?string,
     *   visits?: ?int,
     *   webId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->clicks = $values['clicks'] ?? null;
        $this->conversionRate = $values['conversionRate'] ?? null;
        $this->ecommerce = $values['ecommerce'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->listName = $values['listName'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->publishedAt = $values['publishedAt'] ?? null;
        $this->signupTags = $values['signupTags'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subscribes = $values['subscribes'] ?? null;
        $this->timeseries = $values['timeseries'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->uniqueVisits = $values['uniqueVisits'] ?? null;
        $this->unpublishedAt = $values['unpublishedAt'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->visits = $values['visits'] ?? null;
        $this->webId = $values['webId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
