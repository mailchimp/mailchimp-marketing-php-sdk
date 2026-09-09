<?php

namespace Mailchimp\Campaigns\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Mailchimp\Core\Json\JsonProperty;

/**
 * The days of the week to send a daily RSS Campaign.
 */
class CreateCampaignsRequestRssOptsScheduleDailySend extends JsonSerializableType
{
    /**
     * @var ?bool $friday Sends the daily RSS Campaign on Fridays.
     */
    #[JsonProperty('friday')]
    public ?bool $friday;

    /**
     * @var ?bool $monday Sends the daily RSS Campaign on Mondays.
     */
    #[JsonProperty('monday')]
    public ?bool $monday;

    /**
     * @var ?bool $saturday Sends the daily RSS Campaign on Saturdays.
     */
    #[JsonProperty('saturday')]
    public ?bool $saturday;

    /**
     * @var ?bool $sunday Sends the daily RSS Campaign on Sundays.
     */
    #[JsonProperty('sunday')]
    public ?bool $sunday;

    /**
     * @var ?bool $thursday Sends the daily RSS Campaign on Thursdays.
     */
    #[JsonProperty('thursday')]
    public ?bool $thursday;

    /**
     * @var ?bool $tuesday Sends the daily RSS Campaign on Tuesdays.
     */
    #[JsonProperty('tuesday')]
    public ?bool $tuesday;

    /**
     * @var ?bool $wednesday Sends the daily RSS Campaign on Wednesdays.
     */
    #[JsonProperty('wednesday')]
    public ?bool $wednesday;

    /**
     * @param array{
     *   friday?: ?bool,
     *   monday?: ?bool,
     *   saturday?: ?bool,
     *   sunday?: ?bool,
     *   thursday?: ?bool,
     *   tuesday?: ?bool,
     *   wednesday?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->friday = $values['friday'] ?? null;
        $this->monday = $values['monday'] ?? null;
        $this->saturday = $values['saturday'] ?? null;
        $this->sunday = $values['sunday'] ?? null;
        $this->thursday = $values['thursday'] ?? null;
        $this->tuesday = $values['tuesday'] ?? null;
        $this->wednesday = $values['wednesday'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
