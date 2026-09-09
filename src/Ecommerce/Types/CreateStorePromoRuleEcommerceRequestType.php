<?php

namespace Mailchimp\Ecommerce\Types;

enum CreateStorePromoRuleEcommerceRequestType: string
{
    case Fixed = "fixed";
    case Percentage = "percentage";
}
