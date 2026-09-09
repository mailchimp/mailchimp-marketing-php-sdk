<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;

/**
 * The settings specific to A/B test campaigns.
 */
class CampaignsVariateSettings extends JsonSerializableType
{
    /**
     * @var ?array<CampaignsVariateSettingsCombinationsItem> $combinations Combinations of possible variables used to build emails.
     */
    #[JsonProperty('combinations'), ArrayType([CampaignsVariateSettingsCombinationsItem::class])]
    public ?array $combinations;

    /**
     * @var ?array<string> $contents Descriptions of possible email contents. To set campaign contents, make a PUT request to /campaigns/{campaign_id}/content with the field 'variate_contents'.
     */
    #[JsonProperty('contents'), ArrayType(['string'])]
    public ?array $contents;

    /**
     * @var ?array<string> $fromNames The possible from names. The number of from_names provided must match the number of reply_to_addresses. If no from_names are provided, settings.from_name will be used.
     */
    #[JsonProperty('from_names'), ArrayType(['string'])]
    public ?array $fromNames;

    /**
     * @var ?array<string> $replyToAddresses The possible reply-to addresses. The number of reply_to_addresses provided must match the number of from_names. If no reply_to_addresses are provided, settings.reply_to will be used.
     */
    #[JsonProperty('reply_to_addresses'), ArrayType(['string'])]
    public ?array $replyToAddresses;

    /**
     * @var ?array<DateTime> $sendTimes The possible send times to test. The times provided should be in the format YYYY-MM-DD HH:MM:SS. If send_times are provided to test, the test_size will be set to 100% and winner_criteria will be ignored.
     */
    #[JsonProperty('send_times'), ArrayType(['datetime'])]
    public ?array $sendTimes;

    /**
     * @var ?array<string> $subjectLines The possible subject lines to test. If no subject lines are provided, settings.subject_line will be used.
     */
    #[JsonProperty('subject_lines'), ArrayType(['string'])]
    public ?array $subjectLines;

    /**
     * @var ?int $testSize The percentage of recipients to send the test combinations to, must be a value between 10 and 100.
     */
    #[JsonProperty('test_size')]
    public ?int $testSize;

    /**
     * @var ?int $waitTime The number of minutes to wait before choosing the winning campaign. The value of wait_time must be greater than 0 and in whole hours, specified in minutes.
     */
    #[JsonProperty('wait_time')]
    public ?int $waitTime;

    /**
     * @var ?value-of<CampaignsVariateSettingsWinnerCriteria> $winnerCriteria The combination that performs the best. This may be determined automatically by click rate, open rate, or total revenue -- or you may choose manually based on the reporting data you find the most valuable. For Multivariate Campaigns testing send_time, winner_criteria is ignored. For Multivariate Campaigns with 'manual' as the winner_criteria, the winner must be chosen in the Mailchimp web application.
     */
    #[JsonProperty('winner_criteria')]
    public ?string $winnerCriteria;

    /**
     * @var ?string $winningCampaignId ID of the campaign that was sent to the remaining recipients based on the winning combination.
     */
    #[JsonProperty('winning_campaign_id')]
    public ?string $winningCampaignId;

    /**
     * @var ?string $winningCombinationId ID for the winning combination.
     */
    #[JsonProperty('winning_combination_id')]
    public ?string $winningCombinationId;

    /**
     * @param array{
     *   combinations?: ?array<CampaignsVariateSettingsCombinationsItem>,
     *   contents?: ?array<string>,
     *   fromNames?: ?array<string>,
     *   replyToAddresses?: ?array<string>,
     *   sendTimes?: ?array<DateTime>,
     *   subjectLines?: ?array<string>,
     *   testSize?: ?int,
     *   waitTime?: ?int,
     *   winnerCriteria?: ?value-of<CampaignsVariateSettingsWinnerCriteria>,
     *   winningCampaignId?: ?string,
     *   winningCombinationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->combinations = $values['combinations'] ?? null;
        $this->contents = $values['contents'] ?? null;
        $this->fromNames = $values['fromNames'] ?? null;
        $this->replyToAddresses = $values['replyToAddresses'] ?? null;
        $this->sendTimes = $values['sendTimes'] ?? null;
        $this->subjectLines = $values['subjectLines'] ?? null;
        $this->testSize = $values['testSize'] ?? null;
        $this->waitTime = $values['waitTime'] ?? null;
        $this->winnerCriteria = $values['winnerCriteria'] ?? null;
        $this->winningCampaignId = $values['winningCampaignId'] ?? null;
        $this->winningCombinationId = $values['winningCombinationId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
