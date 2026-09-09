<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;
use DateTime;
use Mailchimp\Core\Types\Date;

/**
 * [A/B Testing](https://mailchimp.com/help/about-ab-tests/) options for a campaign.
 */
class AbTestingOptions extends JsonSerializableType
{
    /**
     * @var ?string $fromNameA For campaigns split on 'From Name', the name for Group A.
     */
    #[JsonProperty('from_name_a')]
    public ?string $fromNameA;

    /**
     * @var ?string $fromNameB For campaigns split on 'From Name', the name for Group B.
     */
    #[JsonProperty('from_name_b')]
    public ?string $fromNameB;

    /**
     * @var ?value-of<AbTestingOptionsPickWinner> $pickWinner How we should evaluate a winner. Based on 'opens', 'clicks', or 'manual'.
     */
    #[JsonProperty('pick_winner')]
    public ?string $pickWinner;

    /**
     * @var ?string $replyEmailA For campaigns split on 'From Name', the reply-to address for Group A.
     */
    #[JsonProperty('reply_email_a')]
    public ?string $replyEmailA;

    /**
     * @var ?string $replyEmailB For campaigns split on 'From Name', the reply-to address for Group B.
     */
    #[JsonProperty('reply_email_b')]
    public ?string $replyEmailB;

    /**
     * @var ?DateTime $sendTimeA The send time for Group A.
     */
    #[JsonProperty('send_time_a'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sendTimeA;

    /**
     * @var ?DateTime $sendTimeB The send time for Group B.
     */
    #[JsonProperty('send_time_b'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $sendTimeB;

    /**
     * @var ?string $sendTimeWinner The send time for the winning version.
     */
    #[JsonProperty('send_time_winner')]
    public ?string $sendTimeWinner;

    /**
     * @var ?int $splitSize The size of the split groups. Campaigns split based on 'schedule' are forced to have a 50/50 split. Valid split integers are between 1-50.
     */
    #[JsonProperty('split_size')]
    public ?int $splitSize;

    /**
     * @var ?value-of<AbTestingOptionsSplitTest> $splitTest The type of AB split to run.
     */
    #[JsonProperty('split_test')]
    public ?string $splitTest;

    /**
     * @var ?string $subjectA For campaigns split on 'Subject Line', the subject line for Group A.
     */
    #[JsonProperty('subject_a')]
    public ?string $subjectA;

    /**
     * @var ?string $subjectB For campaigns split on 'Subject Line', the subject line for Group B.
     */
    #[JsonProperty('subject_b')]
    public ?string $subjectB;

    /**
     * @var ?int $waitTime The amount of time to wait before picking a winner. This cannot be changed after a campaign is sent.
     */
    #[JsonProperty('wait_time')]
    public ?int $waitTime;

    /**
     * @var ?value-of<AbTestingOptionsWaitUnits> $waitUnits How unit of time for measuring the winner ('hours' or 'days'). This cannot be changed after a campaign is sent.
     */
    #[JsonProperty('wait_units')]
    public ?string $waitUnits;

    /**
     * @param array{
     *   fromNameA?: ?string,
     *   fromNameB?: ?string,
     *   pickWinner?: ?value-of<AbTestingOptionsPickWinner>,
     *   replyEmailA?: ?string,
     *   replyEmailB?: ?string,
     *   sendTimeA?: ?DateTime,
     *   sendTimeB?: ?DateTime,
     *   sendTimeWinner?: ?string,
     *   splitSize?: ?int,
     *   splitTest?: ?value-of<AbTestingOptionsSplitTest>,
     *   subjectA?: ?string,
     *   subjectB?: ?string,
     *   waitTime?: ?int,
     *   waitUnits?: ?value-of<AbTestingOptionsWaitUnits>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fromNameA = $values['fromNameA'] ?? null;
        $this->fromNameB = $values['fromNameB'] ?? null;
        $this->pickWinner = $values['pickWinner'] ?? null;
        $this->replyEmailA = $values['replyEmailA'] ?? null;
        $this->replyEmailB = $values['replyEmailB'] ?? null;
        $this->sendTimeA = $values['sendTimeA'] ?? null;
        $this->sendTimeB = $values['sendTimeB'] ?? null;
        $this->sendTimeWinner = $values['sendTimeWinner'] ?? null;
        $this->splitSize = $values['splitSize'] ?? null;
        $this->splitTest = $values['splitTest'] ?? null;
        $this->subjectA = $values['subjectA'] ?? null;
        $this->subjectB = $values['subjectB'] ?? null;
        $this->waitTime = $values['waitTime'] ?? null;
        $this->waitUnits = $values['waitUnits'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
