<?php

namespace Mailchimp\Ecommerce\Types;

enum UpdateStorePromoRuleEcommerceRequestTarget: string
{
    case PerItem = "per_item";
    case Total = "total";
    case Shipping = "shipping";
}
