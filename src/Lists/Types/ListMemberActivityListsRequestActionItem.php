<?php

namespace Mailchimp\Lists\Types;

enum ListMemberActivityListsRequestActionItem: string
{
    case Abuse = "abuse";
    case Bounce = "bounce";
    case Click = "click";
    case Open = "open";
    case Sent = "sent";
    case Unsub = "unsub";
    case Ecomm = "ecomm";
}
