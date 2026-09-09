<?php

namespace Mailchimp\Types;

enum CampaignVariateSettingsWinnerCriteria: string
{
    case Opens = "opens";
    case Clicks = "clicks";
    case Manual = "manual";
    case TotalRevenue = "total_revenue";
}
