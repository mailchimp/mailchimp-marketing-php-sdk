<?php

namespace Mailchimp\Types;

enum AudiencesContactSmsChannelEffectiveSubscriptionStatusValue: string
{
    case Subscribed = "subscribed";
    case Unsubscribed = "unsubscribed";
    case Nonsubscribed = "nonsubscribed";
    case Pending = "pending";
}
