<?php

namespace Mailchimp\Types;

enum ECommercePromoRuleType: string
{
    case Fixed = "fixed";
    case Percentage = "percentage";
}
