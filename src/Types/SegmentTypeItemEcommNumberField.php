<?php

namespace Mailchimp\Types;

enum SegmentTypeItemEcommNumberField: string
{
    case EcommSpentAvg = "ecomm_spent_avg";
    case EcommOrders = "ecomm_orders";
    case EcommProdAll = "ecomm_prod_all";
    case EcommAvgOrd = "ecomm_avg_ord";
}
