<?php

namespace Mailchimp\Campaigns\Types;

enum UpdateCampaignsRequestVariateSettingsWinnerCriteria: string
{
    case Opens = "opens";
    case Clicks = "clicks";
    case Manual = "manual";
    case TotalRevenue = "total_revenue";
}
