<?php

namespace Mailchimp\Types;

enum FacebookAdType: string
{
    case Regular = "regular";
    case EmailTouchpoint = "email-touchpoint";
    case Plaintext = "plaintext";
    case Rss = "rss";
    case Reconfirm = "reconfirm";
    case Variate = "variate";
    case Absplit = "absplit";
    case Automation = "automation";
    case Facebook = "facebook";
    case Google = "google";
    case Autoresponder = "autoresponder";
    case Transactional = "transactional";
    case Page = "page";
    case Website = "website";
    case SocialPost = "social_post";
    case Survey = "survey";
    case CustomerJourney = "customer_journey";
    case Sms = "sms";
}
