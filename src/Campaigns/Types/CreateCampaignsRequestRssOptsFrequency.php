<?php

namespace Mailchimp\Campaigns\Types;

enum CreateCampaignsRequestRssOptsFrequency: string
{
    case Daily = "daily";
    case Weekly = "weekly";
    case Monthly = "monthly";
}
