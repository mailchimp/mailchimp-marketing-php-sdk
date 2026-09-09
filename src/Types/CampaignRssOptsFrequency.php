<?php

namespace Mailchimp\Types;

enum CampaignRssOptsFrequency: string
{
    case Daily = "daily";
    case Weekly = "weekly";
    case Monthly = "monthly";
}
