<?php

namespace Mailchimp\Types;

use Mailchimp\Core\Json\JsonSerializableType;
use Exception;

class SegmentTypeItem extends JsonSerializableType
{
    /**
     * @var (
     *    'Aim'
     *   |'Automation'
     *   |'CampaignPoll'
     *   |'Conversation'
     *   |'Date'
     *   |'EmailClient'
     *   |'Language'
     *   |'MemberRating'
     *   |'SignupSource'
     *   |'SurveyMonkey'
     *   |'VIP'
     *   |'Interests'
     *   |'EcommCategory'
     *   |'EcommNumber'
     *   |'EcommPurchased'
     *   |'EcommSpent'
     *   |'EcommStore'
     *   |'GoalActivity'
     *   |'GoalTimestamp'
     *   |'FuzzySegment'
     *   |'StaticSegment'
     *   |'IPGeoCountryState'
     *   |'IPGeoIn'
     *   |'IPGeoInZip'
     *   |'IPGeoUnknown'
     *   |'IPGeoZip'
     *   |'SocialAge'
     *   |'SocialGender'
     *   |'SocialInfluence'
     *   |'SocialNetworkMember'
     *   |'SocialNetworkFollow'
     *   |'AddressMerge'
     *   |'ZipMerge'
     *   |'BirthdayMerge'
     *   |'DateMerge'
     *   |'SelectMerge'
     *   |'TextMerge'
     *   |'EmailAddress'
     *   |'PredictedGender'
     *   |'PredictedAge'
     *   |'NewSubscribers'
     *   |'_unknown'
     * ) $conditionType
     */
    public readonly string $conditionType;

    /**
     * @var (
     *    SegmentTypeItemAim
     *   |SegmentTypeItemAutomation
     *   |SegmentTypeItemCampaignPoll
     *   |SegmentTypeItemConversation
     *   |SegmentTypeItemDate
     *   |SegmentTypeItemEmailClient
     *   |SegmentTypeItemLanguage
     *   |SegmentTypeItemMemberRating
     *   |SegmentTypeItemSignupSource
     *   |SegmentTypeItemSurveyMonkey
     *   |SegmentTypeItemVip
     *   |SegmentTypeItemInterests
     *   |SegmentTypeItemEcommCategory
     *   |SegmentTypeItemEcommNumber
     *   |SegmentTypeItemEcommPurchased
     *   |SegmentTypeItemEcommSpent
     *   |SegmentTypeItemEcommStore
     *   |SegmentTypeItemGoalActivity
     *   |SegmentTypeItemGoalTimestamp
     *   |SegmentTypeItemFuzzySegment
     *   |SegmentTypeItemStaticSegment
     *   |SegmentTypeItemIpGeoCountryState
     *   |SegmentTypeItemIpGeoIn
     *   |SegmentTypeItemIpGeoInZip
     *   |SegmentTypeItemIpGeoUnknown
     *   |SegmentTypeItemIpGeoZip
     *   |SegmentTypeItemSocialAge
     *   |SegmentTypeItemSocialGender
     *   |SegmentTypeItemSocialInfluence
     *   |SegmentTypeItemSocialNetworkMember
     *   |SegmentTypeItemSocialNetworkFollow
     *   |SegmentTypeItemAddressMerge
     *   |SegmentTypeItemZipMerge
     *   |SegmentTypeItemBirthdayMerge
     *   |SegmentTypeItemDateMerge
     *   |SegmentTypeItemSelectMerge
     *   |SegmentTypeItemTextMerge
     *   |SegmentTypeItemEmailAddress
     *   |SegmentTypeItemPredictedGender
     *   |SegmentTypeItemPredictedAge
     *   |SegmentTypeItemNewSubscribers
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   conditionType: (
     *    'Aim'
     *   |'Automation'
     *   |'CampaignPoll'
     *   |'Conversation'
     *   |'Date'
     *   |'EmailClient'
     *   |'Language'
     *   |'MemberRating'
     *   |'SignupSource'
     *   |'SurveyMonkey'
     *   |'VIP'
     *   |'Interests'
     *   |'EcommCategory'
     *   |'EcommNumber'
     *   |'EcommPurchased'
     *   |'EcommSpent'
     *   |'EcommStore'
     *   |'GoalActivity'
     *   |'GoalTimestamp'
     *   |'FuzzySegment'
     *   |'StaticSegment'
     *   |'IPGeoCountryState'
     *   |'IPGeoIn'
     *   |'IPGeoInZip'
     *   |'IPGeoUnknown'
     *   |'IPGeoZip'
     *   |'SocialAge'
     *   |'SocialGender'
     *   |'SocialInfluence'
     *   |'SocialNetworkMember'
     *   |'SocialNetworkFollow'
     *   |'AddressMerge'
     *   |'ZipMerge'
     *   |'BirthdayMerge'
     *   |'DateMerge'
     *   |'SelectMerge'
     *   |'TextMerge'
     *   |'EmailAddress'
     *   |'PredictedGender'
     *   |'PredictedAge'
     *   |'NewSubscribers'
     *   |'_unknown'
     * ),
     *   value: (
     *    SegmentTypeItemAim
     *   |SegmentTypeItemAutomation
     *   |SegmentTypeItemCampaignPoll
     *   |SegmentTypeItemConversation
     *   |SegmentTypeItemDate
     *   |SegmentTypeItemEmailClient
     *   |SegmentTypeItemLanguage
     *   |SegmentTypeItemMemberRating
     *   |SegmentTypeItemSignupSource
     *   |SegmentTypeItemSurveyMonkey
     *   |SegmentTypeItemVip
     *   |SegmentTypeItemInterests
     *   |SegmentTypeItemEcommCategory
     *   |SegmentTypeItemEcommNumber
     *   |SegmentTypeItemEcommPurchased
     *   |SegmentTypeItemEcommSpent
     *   |SegmentTypeItemEcommStore
     *   |SegmentTypeItemGoalActivity
     *   |SegmentTypeItemGoalTimestamp
     *   |SegmentTypeItemFuzzySegment
     *   |SegmentTypeItemStaticSegment
     *   |SegmentTypeItemIpGeoCountryState
     *   |SegmentTypeItemIpGeoIn
     *   |SegmentTypeItemIpGeoInZip
     *   |SegmentTypeItemIpGeoUnknown
     *   |SegmentTypeItemIpGeoZip
     *   |SegmentTypeItemSocialAge
     *   |SegmentTypeItemSocialGender
     *   |SegmentTypeItemSocialInfluence
     *   |SegmentTypeItemSocialNetworkMember
     *   |SegmentTypeItemSocialNetworkFollow
     *   |SegmentTypeItemAddressMerge
     *   |SegmentTypeItemZipMerge
     *   |SegmentTypeItemBirthdayMerge
     *   |SegmentTypeItemDateMerge
     *   |SegmentTypeItemSelectMerge
     *   |SegmentTypeItemTextMerge
     *   |SegmentTypeItemEmailAddress
     *   |SegmentTypeItemPredictedGender
     *   |SegmentTypeItemPredictedAge
     *   |SegmentTypeItemNewSubscribers
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->conditionType = $values['conditionType'];
        $this->value = $values['value'];
    }

    /**
     * @param SegmentTypeItemAim $aim
     * @return SegmentTypeItem
     */
    public static function aim(SegmentTypeItemAim $aim): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'Aim',
            'value' => $aim,
        ]);
    }

    /**
     * @param SegmentTypeItemAutomation $automation
     * @return SegmentTypeItem
     */
    public static function automation(SegmentTypeItemAutomation $automation): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'Automation',
            'value' => $automation,
        ]);
    }

    /**
     * @param SegmentTypeItemCampaignPoll $campaignPoll
     * @return SegmentTypeItem
     */
    public static function campaignPoll(SegmentTypeItemCampaignPoll $campaignPoll): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'CampaignPoll',
            'value' => $campaignPoll,
        ]);
    }

    /**
     * @param SegmentTypeItemConversation $conversation
     * @return SegmentTypeItem
     */
    public static function conversation(SegmentTypeItemConversation $conversation): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'Conversation',
            'value' => $conversation,
        ]);
    }

    /**
     * @param SegmentTypeItemDate $date
     * @return SegmentTypeItem
     */
    public static function date(SegmentTypeItemDate $date): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'Date',
            'value' => $date,
        ]);
    }

    /**
     * @param SegmentTypeItemEmailClient $emailClient
     * @return SegmentTypeItem
     */
    public static function emailClient(SegmentTypeItemEmailClient $emailClient): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'EmailClient',
            'value' => $emailClient,
        ]);
    }

    /**
     * @param SegmentTypeItemLanguage $language
     * @return SegmentTypeItem
     */
    public static function language(SegmentTypeItemLanguage $language): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'Language',
            'value' => $language,
        ]);
    }

    /**
     * @param SegmentTypeItemMemberRating $memberRating
     * @return SegmentTypeItem
     */
    public static function memberRating(SegmentTypeItemMemberRating $memberRating): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'MemberRating',
            'value' => $memberRating,
        ]);
    }

    /**
     * @param SegmentTypeItemSignupSource $signupSource
     * @return SegmentTypeItem
     */
    public static function signupSource(SegmentTypeItemSignupSource $signupSource): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'SignupSource',
            'value' => $signupSource,
        ]);
    }

    /**
     * @param SegmentTypeItemSurveyMonkey $surveyMonkey
     * @return SegmentTypeItem
     */
    public static function surveyMonkey(SegmentTypeItemSurveyMonkey $surveyMonkey): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'SurveyMonkey',
            'value' => $surveyMonkey,
        ]);
    }

    /**
     * @param SegmentTypeItemVip $vip
     * @return SegmentTypeItem
     */
    public static function vip(SegmentTypeItemVip $vip): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'VIP',
            'value' => $vip,
        ]);
    }

    /**
     * @param SegmentTypeItemInterests $interests
     * @return SegmentTypeItem
     */
    public static function interests(SegmentTypeItemInterests $interests): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'Interests',
            'value' => $interests,
        ]);
    }

    /**
     * @param SegmentTypeItemEcommCategory $ecommCategory
     * @return SegmentTypeItem
     */
    public static function ecommCategory(SegmentTypeItemEcommCategory $ecommCategory): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'EcommCategory',
            'value' => $ecommCategory,
        ]);
    }

    /**
     * @param SegmentTypeItemEcommNumber $ecommNumber
     * @return SegmentTypeItem
     */
    public static function ecommNumber(SegmentTypeItemEcommNumber $ecommNumber): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'EcommNumber',
            'value' => $ecommNumber,
        ]);
    }

    /**
     * @param SegmentTypeItemEcommPurchased $ecommPurchased
     * @return SegmentTypeItem
     */
    public static function ecommPurchased(SegmentTypeItemEcommPurchased $ecommPurchased): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'EcommPurchased',
            'value' => $ecommPurchased,
        ]);
    }

    /**
     * @param SegmentTypeItemEcommSpent $ecommSpent
     * @return SegmentTypeItem
     */
    public static function ecommSpent(SegmentTypeItemEcommSpent $ecommSpent): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'EcommSpent',
            'value' => $ecommSpent,
        ]);
    }

    /**
     * @param SegmentTypeItemEcommStore $ecommStore
     * @return SegmentTypeItem
     */
    public static function ecommStore(SegmentTypeItemEcommStore $ecommStore): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'EcommStore',
            'value' => $ecommStore,
        ]);
    }

    /**
     * @param SegmentTypeItemGoalActivity $goalActivity
     * @return SegmentTypeItem
     */
    public static function goalActivity(SegmentTypeItemGoalActivity $goalActivity): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'GoalActivity',
            'value' => $goalActivity,
        ]);
    }

    /**
     * @param SegmentTypeItemGoalTimestamp $goalTimestamp
     * @return SegmentTypeItem
     */
    public static function goalTimestamp(SegmentTypeItemGoalTimestamp $goalTimestamp): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'GoalTimestamp',
            'value' => $goalTimestamp,
        ]);
    }

    /**
     * @param SegmentTypeItemFuzzySegment $fuzzySegment
     * @return SegmentTypeItem
     */
    public static function fuzzySegment(SegmentTypeItemFuzzySegment $fuzzySegment): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'FuzzySegment',
            'value' => $fuzzySegment,
        ]);
    }

    /**
     * @param SegmentTypeItemStaticSegment $staticSegment
     * @return SegmentTypeItem
     */
    public static function staticSegment(SegmentTypeItemStaticSegment $staticSegment): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'StaticSegment',
            'value' => $staticSegment,
        ]);
    }

    /**
     * @param SegmentTypeItemIpGeoCountryState $ipGeoCountryState
     * @return SegmentTypeItem
     */
    public static function ipGeoCountryState(SegmentTypeItemIpGeoCountryState $ipGeoCountryState): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'IPGeoCountryState',
            'value' => $ipGeoCountryState,
        ]);
    }

    /**
     * @param SegmentTypeItemIpGeoIn $ipGeoIn
     * @return SegmentTypeItem
     */
    public static function ipGeoIn(SegmentTypeItemIpGeoIn $ipGeoIn): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'IPGeoIn',
            'value' => $ipGeoIn,
        ]);
    }

    /**
     * @param SegmentTypeItemIpGeoInZip $ipGeoInZip
     * @return SegmentTypeItem
     */
    public static function ipGeoInZip(SegmentTypeItemIpGeoInZip $ipGeoInZip): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'IPGeoInZip',
            'value' => $ipGeoInZip,
        ]);
    }

    /**
     * @param SegmentTypeItemIpGeoUnknown $ipGeoUnknown
     * @return SegmentTypeItem
     */
    public static function ipGeoUnknown(SegmentTypeItemIpGeoUnknown $ipGeoUnknown): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'IPGeoUnknown',
            'value' => $ipGeoUnknown,
        ]);
    }

    /**
     * @param SegmentTypeItemIpGeoZip $ipGeoZip
     * @return SegmentTypeItem
     */
    public static function ipGeoZip(SegmentTypeItemIpGeoZip $ipGeoZip): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'IPGeoZip',
            'value' => $ipGeoZip,
        ]);
    }

    /**
     * @param SegmentTypeItemSocialAge $socialAge
     * @return SegmentTypeItem
     */
    public static function socialAge(SegmentTypeItemSocialAge $socialAge): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'SocialAge',
            'value' => $socialAge,
        ]);
    }

    /**
     * @param SegmentTypeItemSocialGender $socialGender
     * @return SegmentTypeItem
     */
    public static function socialGender(SegmentTypeItemSocialGender $socialGender): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'SocialGender',
            'value' => $socialGender,
        ]);
    }

    /**
     * @param SegmentTypeItemSocialInfluence $socialInfluence
     * @return SegmentTypeItem
     */
    public static function socialInfluence(SegmentTypeItemSocialInfluence $socialInfluence): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'SocialInfluence',
            'value' => $socialInfluence,
        ]);
    }

    /**
     * @param SegmentTypeItemSocialNetworkMember $socialNetworkMember
     * @return SegmentTypeItem
     */
    public static function socialNetworkMember(SegmentTypeItemSocialNetworkMember $socialNetworkMember): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'SocialNetworkMember',
            'value' => $socialNetworkMember,
        ]);
    }

    /**
     * @param SegmentTypeItemSocialNetworkFollow $socialNetworkFollow
     * @return SegmentTypeItem
     */
    public static function socialNetworkFollow(SegmentTypeItemSocialNetworkFollow $socialNetworkFollow): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'SocialNetworkFollow',
            'value' => $socialNetworkFollow,
        ]);
    }

    /**
     * @param SegmentTypeItemAddressMerge $addressMerge
     * @return SegmentTypeItem
     */
    public static function addressMerge(SegmentTypeItemAddressMerge $addressMerge): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'AddressMerge',
            'value' => $addressMerge,
        ]);
    }

    /**
     * @param SegmentTypeItemZipMerge $zipMerge
     * @return SegmentTypeItem
     */
    public static function zipMerge(SegmentTypeItemZipMerge $zipMerge): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'ZipMerge',
            'value' => $zipMerge,
        ]);
    }

    /**
     * @param SegmentTypeItemBirthdayMerge $birthdayMerge
     * @return SegmentTypeItem
     */
    public static function birthdayMerge(SegmentTypeItemBirthdayMerge $birthdayMerge): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'BirthdayMerge',
            'value' => $birthdayMerge,
        ]);
    }

    /**
     * @param SegmentTypeItemDateMerge $dateMerge
     * @return SegmentTypeItem
     */
    public static function dateMerge(SegmentTypeItemDateMerge $dateMerge): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'DateMerge',
            'value' => $dateMerge,
        ]);
    }

    /**
     * @param SegmentTypeItemSelectMerge $selectMerge
     * @return SegmentTypeItem
     */
    public static function selectMerge(SegmentTypeItemSelectMerge $selectMerge): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'SelectMerge',
            'value' => $selectMerge,
        ]);
    }

    /**
     * @param SegmentTypeItemTextMerge $textMerge
     * @return SegmentTypeItem
     */
    public static function textMerge(SegmentTypeItemTextMerge $textMerge): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'TextMerge',
            'value' => $textMerge,
        ]);
    }

    /**
     * @param SegmentTypeItemEmailAddress $emailAddress
     * @return SegmentTypeItem
     */
    public static function emailAddress(SegmentTypeItemEmailAddress $emailAddress): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'EmailAddress',
            'value' => $emailAddress,
        ]);
    }

    /**
     * @param SegmentTypeItemPredictedGender $predictedGender
     * @return SegmentTypeItem
     */
    public static function predictedGender(SegmentTypeItemPredictedGender $predictedGender): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'PredictedGender',
            'value' => $predictedGender,
        ]);
    }

    /**
     * @param SegmentTypeItemPredictedAge $predictedAge
     * @return SegmentTypeItem
     */
    public static function predictedAge(SegmentTypeItemPredictedAge $predictedAge): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'PredictedAge',
            'value' => $predictedAge,
        ]);
    }

    /**
     * @param SegmentTypeItemNewSubscribers $newSubscribers
     * @return SegmentTypeItem
     */
    public static function newSubscribers(SegmentTypeItemNewSubscribers $newSubscribers): SegmentTypeItem
    {
        return new SegmentTypeItem([
            'conditionType' => 'NewSubscribers',
            'value' => $newSubscribers,
        ]);
    }

    /**
     * @return bool
     */
    public function isAim(): bool
    {
        return $this->value instanceof SegmentTypeItemAim && $this->conditionType === 'Aim';
    }

    /**
     * @return SegmentTypeItemAim
     */
    public function asAim(): SegmentTypeItemAim
    {
        if (!($this->value instanceof SegmentTypeItemAim && $this->conditionType === 'Aim')) {
            throw new Exception(
                "Expected Aim; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isAutomation(): bool
    {
        return $this->value instanceof SegmentTypeItemAutomation && $this->conditionType === 'Automation';
    }

    /**
     * @return SegmentTypeItemAutomation
     */
    public function asAutomation(): SegmentTypeItemAutomation
    {
        if (!($this->value instanceof SegmentTypeItemAutomation && $this->conditionType === 'Automation')) {
            throw new Exception(
                "Expected Automation; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCampaignPoll(): bool
    {
        return $this->value instanceof SegmentTypeItemCampaignPoll && $this->conditionType === 'CampaignPoll';
    }

    /**
     * @return SegmentTypeItemCampaignPoll
     */
    public function asCampaignPoll(): SegmentTypeItemCampaignPoll
    {
        if (!($this->value instanceof SegmentTypeItemCampaignPoll && $this->conditionType === 'CampaignPoll')) {
            throw new Exception(
                "Expected CampaignPoll; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isConversation(): bool
    {
        return $this->value instanceof SegmentTypeItemConversation && $this->conditionType === 'Conversation';
    }

    /**
     * @return SegmentTypeItemConversation
     */
    public function asConversation(): SegmentTypeItemConversation
    {
        if (!($this->value instanceof SegmentTypeItemConversation && $this->conditionType === 'Conversation')) {
            throw new Exception(
                "Expected Conversation; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isDate(): bool
    {
        return $this->value instanceof SegmentTypeItemDate && $this->conditionType === 'Date';
    }

    /**
     * @return SegmentTypeItemDate
     */
    public function asDate(): SegmentTypeItemDate
    {
        if (!($this->value instanceof SegmentTypeItemDate && $this->conditionType === 'Date')) {
            throw new Exception(
                "Expected Date; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isEmailClient(): bool
    {
        return $this->value instanceof SegmentTypeItemEmailClient && $this->conditionType === 'EmailClient';
    }

    /**
     * @return SegmentTypeItemEmailClient
     */
    public function asEmailClient(): SegmentTypeItemEmailClient
    {
        if (!($this->value instanceof SegmentTypeItemEmailClient && $this->conditionType === 'EmailClient')) {
            throw new Exception(
                "Expected EmailClient; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isLanguage(): bool
    {
        return $this->value instanceof SegmentTypeItemLanguage && $this->conditionType === 'Language';
    }

    /**
     * @return SegmentTypeItemLanguage
     */
    public function asLanguage(): SegmentTypeItemLanguage
    {
        if (!($this->value instanceof SegmentTypeItemLanguage && $this->conditionType === 'Language')) {
            throw new Exception(
                "Expected Language; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isMemberRating(): bool
    {
        return $this->value instanceof SegmentTypeItemMemberRating && $this->conditionType === 'MemberRating';
    }

    /**
     * @return SegmentTypeItemMemberRating
     */
    public function asMemberRating(): SegmentTypeItemMemberRating
    {
        if (!($this->value instanceof SegmentTypeItemMemberRating && $this->conditionType === 'MemberRating')) {
            throw new Exception(
                "Expected MemberRating; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSignupSource(): bool
    {
        return $this->value instanceof SegmentTypeItemSignupSource && $this->conditionType === 'SignupSource';
    }

    /**
     * @return SegmentTypeItemSignupSource
     */
    public function asSignupSource(): SegmentTypeItemSignupSource
    {
        if (!($this->value instanceof SegmentTypeItemSignupSource && $this->conditionType === 'SignupSource')) {
            throw new Exception(
                "Expected SignupSource; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSurveyMonkey(): bool
    {
        return $this->value instanceof SegmentTypeItemSurveyMonkey && $this->conditionType === 'SurveyMonkey';
    }

    /**
     * @return SegmentTypeItemSurveyMonkey
     */
    public function asSurveyMonkey(): SegmentTypeItemSurveyMonkey
    {
        if (!($this->value instanceof SegmentTypeItemSurveyMonkey && $this->conditionType === 'SurveyMonkey')) {
            throw new Exception(
                "Expected SurveyMonkey; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isVip(): bool
    {
        return $this->value instanceof SegmentTypeItemVip && $this->conditionType === 'VIP';
    }

    /**
     * @return SegmentTypeItemVip
     */
    public function asVip(): SegmentTypeItemVip
    {
        if (!($this->value instanceof SegmentTypeItemVip && $this->conditionType === 'VIP')) {
            throw new Exception(
                "Expected VIP; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isInterests(): bool
    {
        return $this->value instanceof SegmentTypeItemInterests && $this->conditionType === 'Interests';
    }

    /**
     * @return SegmentTypeItemInterests
     */
    public function asInterests(): SegmentTypeItemInterests
    {
        if (!($this->value instanceof SegmentTypeItemInterests && $this->conditionType === 'Interests')) {
            throw new Exception(
                "Expected Interests; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isEcommCategory(): bool
    {
        return $this->value instanceof SegmentTypeItemEcommCategory && $this->conditionType === 'EcommCategory';
    }

    /**
     * @return SegmentTypeItemEcommCategory
     */
    public function asEcommCategory(): SegmentTypeItemEcommCategory
    {
        if (!($this->value instanceof SegmentTypeItemEcommCategory && $this->conditionType === 'EcommCategory')) {
            throw new Exception(
                "Expected EcommCategory; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isEcommNumber(): bool
    {
        return $this->value instanceof SegmentTypeItemEcommNumber && $this->conditionType === 'EcommNumber';
    }

    /**
     * @return SegmentTypeItemEcommNumber
     */
    public function asEcommNumber(): SegmentTypeItemEcommNumber
    {
        if (!($this->value instanceof SegmentTypeItemEcommNumber && $this->conditionType === 'EcommNumber')) {
            throw new Exception(
                "Expected EcommNumber; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isEcommPurchased(): bool
    {
        return $this->value instanceof SegmentTypeItemEcommPurchased && $this->conditionType === 'EcommPurchased';
    }

    /**
     * @return SegmentTypeItemEcommPurchased
     */
    public function asEcommPurchased(): SegmentTypeItemEcommPurchased
    {
        if (!($this->value instanceof SegmentTypeItemEcommPurchased && $this->conditionType === 'EcommPurchased')) {
            throw new Exception(
                "Expected EcommPurchased; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isEcommSpent(): bool
    {
        return $this->value instanceof SegmentTypeItemEcommSpent && $this->conditionType === 'EcommSpent';
    }

    /**
     * @return SegmentTypeItemEcommSpent
     */
    public function asEcommSpent(): SegmentTypeItemEcommSpent
    {
        if (!($this->value instanceof SegmentTypeItemEcommSpent && $this->conditionType === 'EcommSpent')) {
            throw new Exception(
                "Expected EcommSpent; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isEcommStore(): bool
    {
        return $this->value instanceof SegmentTypeItemEcommStore && $this->conditionType === 'EcommStore';
    }

    /**
     * @return SegmentTypeItemEcommStore
     */
    public function asEcommStore(): SegmentTypeItemEcommStore
    {
        if (!($this->value instanceof SegmentTypeItemEcommStore && $this->conditionType === 'EcommStore')) {
            throw new Exception(
                "Expected EcommStore; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isGoalActivity(): bool
    {
        return $this->value instanceof SegmentTypeItemGoalActivity && $this->conditionType === 'GoalActivity';
    }

    /**
     * @return SegmentTypeItemGoalActivity
     */
    public function asGoalActivity(): SegmentTypeItemGoalActivity
    {
        if (!($this->value instanceof SegmentTypeItemGoalActivity && $this->conditionType === 'GoalActivity')) {
            throw new Exception(
                "Expected GoalActivity; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isGoalTimestamp(): bool
    {
        return $this->value instanceof SegmentTypeItemGoalTimestamp && $this->conditionType === 'GoalTimestamp';
    }

    /**
     * @return SegmentTypeItemGoalTimestamp
     */
    public function asGoalTimestamp(): SegmentTypeItemGoalTimestamp
    {
        if (!($this->value instanceof SegmentTypeItemGoalTimestamp && $this->conditionType === 'GoalTimestamp')) {
            throw new Exception(
                "Expected GoalTimestamp; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isFuzzySegment(): bool
    {
        return $this->value instanceof SegmentTypeItemFuzzySegment && $this->conditionType === 'FuzzySegment';
    }

    /**
     * @return SegmentTypeItemFuzzySegment
     */
    public function asFuzzySegment(): SegmentTypeItemFuzzySegment
    {
        if (!($this->value instanceof SegmentTypeItemFuzzySegment && $this->conditionType === 'FuzzySegment')) {
            throw new Exception(
                "Expected FuzzySegment; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isStaticSegment(): bool
    {
        return $this->value instanceof SegmentTypeItemStaticSegment && $this->conditionType === 'StaticSegment';
    }

    /**
     * @return SegmentTypeItemStaticSegment
     */
    public function asStaticSegment(): SegmentTypeItemStaticSegment
    {
        if (!($this->value instanceof SegmentTypeItemStaticSegment && $this->conditionType === 'StaticSegment')) {
            throw new Exception(
                "Expected StaticSegment; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isIpGeoCountryState(): bool
    {
        return $this->value instanceof SegmentTypeItemIpGeoCountryState && $this->conditionType === 'IPGeoCountryState';
    }

    /**
     * @return SegmentTypeItemIpGeoCountryState
     */
    public function asIpGeoCountryState(): SegmentTypeItemIpGeoCountryState
    {
        if (!($this->value instanceof SegmentTypeItemIpGeoCountryState && $this->conditionType === 'IPGeoCountryState')) {
            throw new Exception(
                "Expected IPGeoCountryState; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isIpGeoIn(): bool
    {
        return $this->value instanceof SegmentTypeItemIpGeoIn && $this->conditionType === 'IPGeoIn';
    }

    /**
     * @return SegmentTypeItemIpGeoIn
     */
    public function asIpGeoIn(): SegmentTypeItemIpGeoIn
    {
        if (!($this->value instanceof SegmentTypeItemIpGeoIn && $this->conditionType === 'IPGeoIn')) {
            throw new Exception(
                "Expected IPGeoIn; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isIpGeoInZip(): bool
    {
        return $this->value instanceof SegmentTypeItemIpGeoInZip && $this->conditionType === 'IPGeoInZip';
    }

    /**
     * @return SegmentTypeItemIpGeoInZip
     */
    public function asIpGeoInZip(): SegmentTypeItemIpGeoInZip
    {
        if (!($this->value instanceof SegmentTypeItemIpGeoInZip && $this->conditionType === 'IPGeoInZip')) {
            throw new Exception(
                "Expected IPGeoInZip; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isIpGeoUnknown(): bool
    {
        return $this->value instanceof SegmentTypeItemIpGeoUnknown && $this->conditionType === 'IPGeoUnknown';
    }

    /**
     * @return SegmentTypeItemIpGeoUnknown
     */
    public function asIpGeoUnknown(): SegmentTypeItemIpGeoUnknown
    {
        if (!($this->value instanceof SegmentTypeItemIpGeoUnknown && $this->conditionType === 'IPGeoUnknown')) {
            throw new Exception(
                "Expected IPGeoUnknown; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isIpGeoZip(): bool
    {
        return $this->value instanceof SegmentTypeItemIpGeoZip && $this->conditionType === 'IPGeoZip';
    }

    /**
     * @return SegmentTypeItemIpGeoZip
     */
    public function asIpGeoZip(): SegmentTypeItemIpGeoZip
    {
        if (!($this->value instanceof SegmentTypeItemIpGeoZip && $this->conditionType === 'IPGeoZip')) {
            throw new Exception(
                "Expected IPGeoZip; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSocialAge(): bool
    {
        return $this->value instanceof SegmentTypeItemSocialAge && $this->conditionType === 'SocialAge';
    }

    /**
     * @return SegmentTypeItemSocialAge
     */
    public function asSocialAge(): SegmentTypeItemSocialAge
    {
        if (!($this->value instanceof SegmentTypeItemSocialAge && $this->conditionType === 'SocialAge')) {
            throw new Exception(
                "Expected SocialAge; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSocialGender(): bool
    {
        return $this->value instanceof SegmentTypeItemSocialGender && $this->conditionType === 'SocialGender';
    }

    /**
     * @return SegmentTypeItemSocialGender
     */
    public function asSocialGender(): SegmentTypeItemSocialGender
    {
        if (!($this->value instanceof SegmentTypeItemSocialGender && $this->conditionType === 'SocialGender')) {
            throw new Exception(
                "Expected SocialGender; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSocialInfluence(): bool
    {
        return $this->value instanceof SegmentTypeItemSocialInfluence && $this->conditionType === 'SocialInfluence';
    }

    /**
     * @return SegmentTypeItemSocialInfluence
     */
    public function asSocialInfluence(): SegmentTypeItemSocialInfluence
    {
        if (!($this->value instanceof SegmentTypeItemSocialInfluence && $this->conditionType === 'SocialInfluence')) {
            throw new Exception(
                "Expected SocialInfluence; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSocialNetworkMember(): bool
    {
        return $this->value instanceof SegmentTypeItemSocialNetworkMember && $this->conditionType === 'SocialNetworkMember';
    }

    /**
     * @return SegmentTypeItemSocialNetworkMember
     */
    public function asSocialNetworkMember(): SegmentTypeItemSocialNetworkMember
    {
        if (!($this->value instanceof SegmentTypeItemSocialNetworkMember && $this->conditionType === 'SocialNetworkMember')) {
            throw new Exception(
                "Expected SocialNetworkMember; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSocialNetworkFollow(): bool
    {
        return $this->value instanceof SegmentTypeItemSocialNetworkFollow && $this->conditionType === 'SocialNetworkFollow';
    }

    /**
     * @return SegmentTypeItemSocialNetworkFollow
     */
    public function asSocialNetworkFollow(): SegmentTypeItemSocialNetworkFollow
    {
        if (!($this->value instanceof SegmentTypeItemSocialNetworkFollow && $this->conditionType === 'SocialNetworkFollow')) {
            throw new Exception(
                "Expected SocialNetworkFollow; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isAddressMerge(): bool
    {
        return $this->value instanceof SegmentTypeItemAddressMerge && $this->conditionType === 'AddressMerge';
    }

    /**
     * @return SegmentTypeItemAddressMerge
     */
    public function asAddressMerge(): SegmentTypeItemAddressMerge
    {
        if (!($this->value instanceof SegmentTypeItemAddressMerge && $this->conditionType === 'AddressMerge')) {
            throw new Exception(
                "Expected AddressMerge; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isZipMerge(): bool
    {
        return $this->value instanceof SegmentTypeItemZipMerge && $this->conditionType === 'ZipMerge';
    }

    /**
     * @return SegmentTypeItemZipMerge
     */
    public function asZipMerge(): SegmentTypeItemZipMerge
    {
        if (!($this->value instanceof SegmentTypeItemZipMerge && $this->conditionType === 'ZipMerge')) {
            throw new Exception(
                "Expected ZipMerge; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isBirthdayMerge(): bool
    {
        return $this->value instanceof SegmentTypeItemBirthdayMerge && $this->conditionType === 'BirthdayMerge';
    }

    /**
     * @return SegmentTypeItemBirthdayMerge
     */
    public function asBirthdayMerge(): SegmentTypeItemBirthdayMerge
    {
        if (!($this->value instanceof SegmentTypeItemBirthdayMerge && $this->conditionType === 'BirthdayMerge')) {
            throw new Exception(
                "Expected BirthdayMerge; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isDateMerge(): bool
    {
        return $this->value instanceof SegmentTypeItemDateMerge && $this->conditionType === 'DateMerge';
    }

    /**
     * @return SegmentTypeItemDateMerge
     */
    public function asDateMerge(): SegmentTypeItemDateMerge
    {
        if (!($this->value instanceof SegmentTypeItemDateMerge && $this->conditionType === 'DateMerge')) {
            throw new Exception(
                "Expected DateMerge; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSelectMerge(): bool
    {
        return $this->value instanceof SegmentTypeItemSelectMerge && $this->conditionType === 'SelectMerge';
    }

    /**
     * @return SegmentTypeItemSelectMerge
     */
    public function asSelectMerge(): SegmentTypeItemSelectMerge
    {
        if (!($this->value instanceof SegmentTypeItemSelectMerge && $this->conditionType === 'SelectMerge')) {
            throw new Exception(
                "Expected SelectMerge; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isTextMerge(): bool
    {
        return $this->value instanceof SegmentTypeItemTextMerge && $this->conditionType === 'TextMerge';
    }

    /**
     * @return SegmentTypeItemTextMerge
     */
    public function asTextMerge(): SegmentTypeItemTextMerge
    {
        if (!($this->value instanceof SegmentTypeItemTextMerge && $this->conditionType === 'TextMerge')) {
            throw new Exception(
                "Expected TextMerge; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isEmailAddress(): bool
    {
        return $this->value instanceof SegmentTypeItemEmailAddress && $this->conditionType === 'EmailAddress';
    }

    /**
     * @return SegmentTypeItemEmailAddress
     */
    public function asEmailAddress(): SegmentTypeItemEmailAddress
    {
        if (!($this->value instanceof SegmentTypeItemEmailAddress && $this->conditionType === 'EmailAddress')) {
            throw new Exception(
                "Expected EmailAddress; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isPredictedGender(): bool
    {
        return $this->value instanceof SegmentTypeItemPredictedGender && $this->conditionType === 'PredictedGender';
    }

    /**
     * @return SegmentTypeItemPredictedGender
     */
    public function asPredictedGender(): SegmentTypeItemPredictedGender
    {
        if (!($this->value instanceof SegmentTypeItemPredictedGender && $this->conditionType === 'PredictedGender')) {
            throw new Exception(
                "Expected PredictedGender; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isPredictedAge(): bool
    {
        return $this->value instanceof SegmentTypeItemPredictedAge && $this->conditionType === 'PredictedAge';
    }

    /**
     * @return SegmentTypeItemPredictedAge
     */
    public function asPredictedAge(): SegmentTypeItemPredictedAge
    {
        if (!($this->value instanceof SegmentTypeItemPredictedAge && $this->conditionType === 'PredictedAge')) {
            throw new Exception(
                "Expected PredictedAge; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isNewSubscribers(): bool
    {
        return $this->value instanceof SegmentTypeItemNewSubscribers && $this->conditionType === 'NewSubscribers';
    }

    /**
     * @return SegmentTypeItemNewSubscribers
     */
    public function asNewSubscribers(): SegmentTypeItemNewSubscribers
    {
        if (!($this->value instanceof SegmentTypeItemNewSubscribers && $this->conditionType === 'NewSubscribers')) {
            throw new Exception(
                "Expected NewSubscribers; got " . $this->conditionType . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        $result = [];
        $result['condition_type'] = $this->conditionType;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->conditionType) {
            case 'Aim':
                $value = $this->asAim()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'Automation':
                $value = $this->asAutomation()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'CampaignPoll':
                $value = $this->asCampaignPoll()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'Conversation':
                $value = $this->asConversation()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'Date':
                $value = $this->asDate()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'EmailClient':
                $value = $this->asEmailClient()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'Language':
                $value = $this->asLanguage()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'MemberRating':
                $value = $this->asMemberRating()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'SignupSource':
                $value = $this->asSignupSource()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'SurveyMonkey':
                $value = $this->asSurveyMonkey()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'VIP':
                $value = $this->asVip()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'Interests':
                $value = $this->asInterests()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'EcommCategory':
                $value = $this->asEcommCategory()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'EcommNumber':
                $value = $this->asEcommNumber()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'EcommPurchased':
                $value = $this->asEcommPurchased()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'EcommSpent':
                $value = $this->asEcommSpent()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'EcommStore':
                $value = $this->asEcommStore()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'GoalActivity':
                $value = $this->asGoalActivity()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'GoalTimestamp':
                $value = $this->asGoalTimestamp()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'FuzzySegment':
                $value = $this->asFuzzySegment()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'StaticSegment':
                $value = $this->asStaticSegment()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'IPGeoCountryState':
                $value = $this->asIpGeoCountryState()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'IPGeoIn':
                $value = $this->asIpGeoIn()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'IPGeoInZip':
                $value = $this->asIpGeoInZip()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'IPGeoUnknown':
                $value = $this->asIpGeoUnknown()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'IPGeoZip':
                $value = $this->asIpGeoZip()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'SocialAge':
                $value = $this->asSocialAge()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'SocialGender':
                $value = $this->asSocialGender()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'SocialInfluence':
                $value = $this->asSocialInfluence()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'SocialNetworkMember':
                $value = $this->asSocialNetworkMember()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'SocialNetworkFollow':
                $value = $this->asSocialNetworkFollow()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'AddressMerge':
                $value = $this->asAddressMerge()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'ZipMerge':
                $value = $this->asZipMerge()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'BirthdayMerge':
                $value = $this->asBirthdayMerge()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'DateMerge':
                $value = $this->asDateMerge()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'SelectMerge':
                $value = $this->asSelectMerge()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'TextMerge':
                $value = $this->asTextMerge()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'EmailAddress':
                $value = $this->asEmailAddress()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'PredictedGender':
                $value = $this->asPredictedGender()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'PredictedAge':
                $value = $this->asPredictedAge()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'NewSubscribers':
                $value = $this->asNewSubscribers()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case '_unknown':
            default:
                if (is_null($this->value)) {
                    break;
                }
                if ($this->value instanceof JsonSerializableType) {
                    $value = $this->value->jsonSerialize();
                    $result = array_merge($value, $result);
                } elseif (is_array($this->value)) {
                    $result = array_merge($this->value, $result);
                }
        }

        return $result;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function jsonDeserialize(array $data): static
    {
        $args = [];
        if (!array_key_exists('condition_type', $data)) {
            throw new Exception(
                "JSON data is missing property 'condition_type'",
            );
        }
        $conditionType = $data['condition_type'];
        if (!(is_string($conditionType))) {
            throw new Exception(
                "Expected property 'conditionType' in JSON data to be string, instead received " . get_debug_type($data['condition_type']),
            );
        }

        $args['conditionType'] = $conditionType;
        switch ($conditionType) {
            case 'Aim':
                $args['value'] = SegmentTypeItemAim::jsonDeserialize($data);
                break;
            case 'Automation':
                $args['value'] = SegmentTypeItemAutomation::jsonDeserialize($data);
                break;
            case 'CampaignPoll':
                $args['value'] = SegmentTypeItemCampaignPoll::jsonDeserialize($data);
                break;
            case 'Conversation':
                $args['value'] = SegmentTypeItemConversation::jsonDeserialize($data);
                break;
            case 'Date':
                $args['value'] = SegmentTypeItemDate::jsonDeserialize($data);
                break;
            case 'EmailClient':
                $args['value'] = SegmentTypeItemEmailClient::jsonDeserialize($data);
                break;
            case 'Language':
                $args['value'] = SegmentTypeItemLanguage::jsonDeserialize($data);
                break;
            case 'MemberRating':
                $args['value'] = SegmentTypeItemMemberRating::jsonDeserialize($data);
                break;
            case 'SignupSource':
                $args['value'] = SegmentTypeItemSignupSource::jsonDeserialize($data);
                break;
            case 'SurveyMonkey':
                $args['value'] = SegmentTypeItemSurveyMonkey::jsonDeserialize($data);
                break;
            case 'VIP':
                $args['value'] = SegmentTypeItemVip::jsonDeserialize($data);
                break;
            case 'Interests':
                $args['value'] = SegmentTypeItemInterests::jsonDeserialize($data);
                break;
            case 'EcommCategory':
                $args['value'] = SegmentTypeItemEcommCategory::jsonDeserialize($data);
                break;
            case 'EcommNumber':
                $args['value'] = SegmentTypeItemEcommNumber::jsonDeserialize($data);
                break;
            case 'EcommPurchased':
                $args['value'] = SegmentTypeItemEcommPurchased::jsonDeserialize($data);
                break;
            case 'EcommSpent':
                $args['value'] = SegmentTypeItemEcommSpent::jsonDeserialize($data);
                break;
            case 'EcommStore':
                $args['value'] = SegmentTypeItemEcommStore::jsonDeserialize($data);
                break;
            case 'GoalActivity':
                $args['value'] = SegmentTypeItemGoalActivity::jsonDeserialize($data);
                break;
            case 'GoalTimestamp':
                $args['value'] = SegmentTypeItemGoalTimestamp::jsonDeserialize($data);
                break;
            case 'FuzzySegment':
                $args['value'] = SegmentTypeItemFuzzySegment::jsonDeserialize($data);
                break;
            case 'StaticSegment':
                $args['value'] = SegmentTypeItemStaticSegment::jsonDeserialize($data);
                break;
            case 'IPGeoCountryState':
                $args['value'] = SegmentTypeItemIpGeoCountryState::jsonDeserialize($data);
                break;
            case 'IPGeoIn':
                $args['value'] = SegmentTypeItemIpGeoIn::jsonDeserialize($data);
                break;
            case 'IPGeoInZip':
                $args['value'] = SegmentTypeItemIpGeoInZip::jsonDeserialize($data);
                break;
            case 'IPGeoUnknown':
                $args['value'] = SegmentTypeItemIpGeoUnknown::jsonDeserialize($data);
                break;
            case 'IPGeoZip':
                $args['value'] = SegmentTypeItemIpGeoZip::jsonDeserialize($data);
                break;
            case 'SocialAge':
                $args['value'] = SegmentTypeItemSocialAge::jsonDeserialize($data);
                break;
            case 'SocialGender':
                $args['value'] = SegmentTypeItemSocialGender::jsonDeserialize($data);
                break;
            case 'SocialInfluence':
                $args['value'] = SegmentTypeItemSocialInfluence::jsonDeserialize($data);
                break;
            case 'SocialNetworkMember':
                $args['value'] = SegmentTypeItemSocialNetworkMember::jsonDeserialize($data);
                break;
            case 'SocialNetworkFollow':
                $args['value'] = SegmentTypeItemSocialNetworkFollow::jsonDeserialize($data);
                break;
            case 'AddressMerge':
                $args['value'] = SegmentTypeItemAddressMerge::jsonDeserialize($data);
                break;
            case 'ZipMerge':
                $args['value'] = SegmentTypeItemZipMerge::jsonDeserialize($data);
                break;
            case 'BirthdayMerge':
                $args['value'] = SegmentTypeItemBirthdayMerge::jsonDeserialize($data);
                break;
            case 'DateMerge':
                $args['value'] = SegmentTypeItemDateMerge::jsonDeserialize($data);
                break;
            case 'SelectMerge':
                $args['value'] = SegmentTypeItemSelectMerge::jsonDeserialize($data);
                break;
            case 'TextMerge':
                $args['value'] = SegmentTypeItemTextMerge::jsonDeserialize($data);
                break;
            case 'EmailAddress':
                $args['value'] = SegmentTypeItemEmailAddress::jsonDeserialize($data);
                break;
            case 'PredictedGender':
                $args['value'] = SegmentTypeItemPredictedGender::jsonDeserialize($data);
                break;
            case 'PredictedAge':
                $args['value'] = SegmentTypeItemPredictedAge::jsonDeserialize($data);
                break;
            case 'NewSubscribers':
                $args['value'] = SegmentTypeItemNewSubscribers::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['conditionType'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
