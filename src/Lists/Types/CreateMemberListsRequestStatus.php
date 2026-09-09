<?php

namespace Mailchimp\Lists\Types;

enum CreateMemberListsRequestStatus: string
{
    case Subscribed = "subscribed";
    case Unsubscribed = "unsubscribed";
    case Cleaned = "cleaned";
    case Pending = "pending";
    case Transactional = "transactional";
}
