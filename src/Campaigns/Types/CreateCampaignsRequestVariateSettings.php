<?php

namespace Mailchimp\Campaigns\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use Mailchimp\Core\Types\ArrayType;
use DateTime;
use Mailchimp\Core\Types\Union;

/**
 * The settings specific to A/B test campaigns.
 */
class CreateCampaignsRequestVariateSettings extends JsonSerializableType
{
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
     * @var ?array<(
     *    DateTime
     *   |string
     * )> $sendTimes The possible send times to test. The times provided should be in the format YYYY-MM-DD HH:MM:SS or ISO 8601 date-time format. If send_times are provided to test, the test_size will be set to 100% and winner_criteria will be ignored.
     */
    #[JsonProperty('send_times'), ArrayType([new Union('datetime', 'string')])]
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
     * @var value-of<CreateCampaignsRequestVariateSettingsWinnerCriteria> $winnerCriteria The combination that performs the best. This may be determined automatically by click rate, open rate, or total revenue -- or you may choose manually based on the reporting data you find the most valuable. For Multivariate Campaigns testing send_time, winner_criteria is ignored. For Multivariate Campaigns with 'manual' as the winner_criteria, the winner must be chosen in the Mailchimp web application.
     */
    #[JsonProperty('winner_criteria')]
    public string $winnerCriteria;

    /**
     * @param array{
     *   winnerCriteria: value-of<CreateCampaignsRequestVariateSettingsWinnerCriteria>,
     *   fromNames?: ?array<string>,
     *   replyToAddresses?: ?array<string>,
     *   sendTimes?: ?array<(
     *    DateTime
     *   |string
     * )>,
     *   subjectLines?: ?array<string>,
     *   testSize?: ?int,
     *   waitTime?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->fromNames = $values['fromNames'] ?? null;
        $this->replyToAddresses = $values['replyToAddresses'] ?? null;
        $this->sendTimes = $values['sendTimes'] ?? null;
        $this->subjectLines = $values['subjectLines'] ?? null;
        $this->testSize = $values['testSize'] ?? null;
        $this->waitTime = $values['waitTime'] ?? null;
        $this->winnerCriteria = $values['winnerCriteria'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
