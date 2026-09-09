<?php

namespace Mailchimp\Types;

enum ECommerceStoreAutomationsAbandonedCartStatus: string
{
    case Save = "save";
    case Sending = "sending";
    case Paused = "paused";
}
