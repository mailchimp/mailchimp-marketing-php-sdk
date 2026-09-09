<?php

namespace Mailchimp\Types;

enum ECommercePromoRuleTarget: string
{
    case PerItem = "per_item";
    case Total = "total";
    case Shipping = "shipping";
}
