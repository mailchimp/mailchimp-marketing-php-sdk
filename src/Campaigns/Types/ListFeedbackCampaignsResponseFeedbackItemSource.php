<?php

namespace Mailchimp\Campaigns\Types;

enum ListFeedbackCampaignsResponseFeedbackItemSource: string
{
    case Api = "api";
    case Email = "email";
    case Sms = "sms";
    case Web = "web";
    case Ios = "ios";
    case Android = "android";
}
