<?php

namespace Mailchimp\Types;

enum AudiencesContactEmailChannelEffectiveSubscriptionStatusValue: string
{
    case Subscribed = "subscribed";
    case Unsubscribed = "unsubscribed";
    case Nonsubscribed = "nonsubscribed";
    case Pending = "pending";
}
