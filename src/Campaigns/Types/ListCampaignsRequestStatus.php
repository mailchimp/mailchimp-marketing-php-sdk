<?php

namespace Mailchimp\Campaigns\Types;

enum ListCampaignsRequestStatus: string
{
    case Save = "save";
    case Paused = "paused";
    case Schedule = "schedule";
    case Sending = "sending";
    case Sent = "sent";
}
