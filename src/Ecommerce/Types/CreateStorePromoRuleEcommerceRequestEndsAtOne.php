<?php

namespace Mailchimp\Ecommerce\Types;

enum CreateStorePromoRuleEcommerceRequestEndsAtOne: string
{
    case Empty = "";
    case Zero0000 = "0000-00-00";
    case Zero0000000000 = "0000-00-00 00:00:00";
}
