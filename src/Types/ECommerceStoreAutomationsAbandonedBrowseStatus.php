<?php

namespace Mailchimp\Types;

enum ECommerceStoreAutomationsAbandonedBrowseStatus: string
{
    case Save = "save";
    case Sending = "sending";
    case Paused = "paused";
}
