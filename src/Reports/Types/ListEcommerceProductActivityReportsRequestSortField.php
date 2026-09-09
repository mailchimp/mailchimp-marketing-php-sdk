<?php

namespace Mailchimp\Reports\Types;

enum ListEcommerceProductActivityReportsRequestSortField: string
{
    case Title = "title";
    case TotalRevenue = "total_revenue";
    case TotalPurchased = "total_purchased";
}
