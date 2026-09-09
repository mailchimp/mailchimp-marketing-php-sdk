<?php

namespace Mailchimp\Automations\Types;

enum UpdateEmailAutomationsRequestDelayAction: string
{
    case Signup = "signup";
    case EcommAbandonedBrowse = "ecomm_abandoned_browse";
    case EcommAbandonedCart = "ecomm_abandoned_cart";
}
