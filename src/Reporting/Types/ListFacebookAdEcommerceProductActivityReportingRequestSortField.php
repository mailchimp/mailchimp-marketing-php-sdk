<?php

namespace Mailchimp\Reporting\Types;

enum ListFacebookAdEcommerceProductActivityReportingRequestSortField: string
{
    case Title = "title";
    case TotalRevenue = "total_revenue";
    case TotalPurchased = "total_purchased";
}
