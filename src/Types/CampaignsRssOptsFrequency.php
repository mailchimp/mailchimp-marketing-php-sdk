<?php

namespace Mailchimp\Types;

enum CampaignsRssOptsFrequency: string
{
    case Daily = "daily";
    case Weekly = "weekly";
    case Monthly = "monthly";
}
