<?php

namespace Mailchimp\Ecommerce\Types;

enum UpdateStorePromoRuleEcommerceRequestType: string
{
    case Fixed = "fixed";
    case Percentage = "percentage";
}
