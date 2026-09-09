<?php

namespace Mailchimp\Campaigns\Types;

enum UpdateCampaignsRequestRssOptsScheduleWeeklySendDay: string
{
    case Sunday = "sunday";
    case Monday = "monday";
    case Tuesday = "tuesday";
    case Wednesday = "wednesday";
    case Thursday = "thursday";
    case Friday = "friday";
    case Saturday = "saturday";
}
