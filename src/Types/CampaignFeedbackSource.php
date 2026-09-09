<?php

namespace Mailchimp\Types;

enum CampaignFeedbackSource: string
{
    case Api = "api";
    case Email = "email";
    case Sms = "sms";
    case Web = "web";
    case Ios = "ios";
    case Android = "android";
}
