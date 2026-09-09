<?php

namespace Mailchimp\Campaigns\Types;

enum UpdateCampaignsRequestRssOptsFrequency: string
{
    case Daily = "daily";
    case Weekly = "weekly";
    case Monthly = "monthly";
}
