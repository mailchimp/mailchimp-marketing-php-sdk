<?php

namespace Mailchimp\Lists\Types;

enum BatchSubscribeOrUnsubscribeListsRequestMembersItemStatusIfNew: string
{
    case Subscribed = "subscribed";
    case Unsubscribed = "unsubscribed";
    case Cleaned = "cleaned";
    case Pending = "pending";
    case Transactional = "transactional";
}
