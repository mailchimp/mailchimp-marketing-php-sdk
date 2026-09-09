<?php

namespace Mailchimp\Reporting\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use DateTime;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\Date;

/**
 * The report for a survey.
 */
class GetSurveyReportingResponse extends JsonSerializableType
{
    /**
     * @var ?DateTime $createdAt The date and time the survey was created in ISO 8601 format.
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $id A string that uniquely identifies this survey.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $listId The ID of the list connected to this survey.
     */
    #[JsonProperty('list_id')]
    public ?string $listId;

    /**
     * @var ?string $listName The name of the list connected to this survey.
     */
    #[JsonProperty('list_name')]
    public ?string $listName;

    /**
     * @var ?DateTime $publishedAt The date and time the survey was published in ISO 8601 format.
     */
    #[JsonProperty('published_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $publishedAt;

    /**
     * @var ?value-of<GetSurveyReportingResponseStatus> $status The survey's status.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $title The title of the survey.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?int $totalResponses The total number of responses to this survey.
     */
    #[JsonProperty('total_responses')]
    public ?int $totalResponses;

    /**
     * @var ?DateTime $updatedAt The date and time the survey was last updated in ISO 8601 format.
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?string $url The URL for the survey.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?int $webId The ID used in the Mailchimp web application. View this survey report in your Mailchimp account at `https://{dc}.admin.mailchimp.com/lists/surveys/results?survey_id={web_id}`.
     */
    #[JsonProperty('web_id')]
    public ?int $webId;

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   id?: ?string,
     *   listId?: ?string,
     *   listName?: ?string,
     *   publishedAt?: ?DateTime,
     *   status?: ?value-of<GetSurveyReportingResponseStatus>,
     *   title?: ?string,
     *   totalResponses?: ?int,
     *   updatedAt?: ?DateTime,
     *   url?: ?string,
     *   webId?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->listName = $values['listName'] ?? null;
        $this->publishedAt = $values['publishedAt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->totalResponses = $values['totalResponses'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->url = $values['url'] ?? null;
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
