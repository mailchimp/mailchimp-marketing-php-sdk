<?php

namespace Mailchimp\Types;

enum ListMembersSmsSubscriptionStatus: string
{
    case Subscribed = "subscribed";
    case Unsubscribed = "unsubscribed";
    case Nonsubscribed = "nonsubscribed";
    case Pending = "pending";
}
