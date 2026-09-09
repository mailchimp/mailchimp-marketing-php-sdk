<?php

namespace Mailchimp\Types;

enum SentToStatus: string
{
    case Sent = "sent";
    case Hard = "hard";
    case Soft = "soft";
}
