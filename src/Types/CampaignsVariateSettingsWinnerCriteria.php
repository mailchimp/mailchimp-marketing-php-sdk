<?php

namespace Mailchimp\Types;

enum CampaignsVariateSettingsWinnerCriteria: string
{
    case Opens = "opens";
    case Clicks = "clicks";
    case Manual = "manual";
    case TotalRevenue = "total_revenue";
}
