<?php

namespace Mailchimp\Types;

enum ListsSegmentsMembersStatus: string
{
    case Subscribed = "subscribed";
    case Unsubscribed = "unsubscribed";
    case Cleaned = "cleaned";
    case Pending = "pending";
    case Transactional = "transactional";
}
