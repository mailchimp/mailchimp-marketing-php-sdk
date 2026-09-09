<?php

namespace Mailchimp\Types;

enum ListMembersStatus: string
{
    case Subscribed = "subscribed";
    case Unsubscribed = "unsubscribed";
    case Cleaned = "cleaned";
    case Pending = "pending";
    case Transactional = "transactional";
    case Archived = "archived";
}
