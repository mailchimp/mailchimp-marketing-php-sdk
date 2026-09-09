<?php

namespace Mailchimp\Ecommerce\Types;

enum CreateStorePromoRuleEcommerceRequestTarget: string
{
    case PerItem = "per_item";
    case Total = "total";
    case Shipping = "shipping";
}
