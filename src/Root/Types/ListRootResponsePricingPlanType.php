<?php

namespace Mailchimp\Root\Types;

enum ListRootResponsePricingPlanType: string
{
    case Monthly = "monthly";
    case PayAsYouGo = "pay_as_you_go";
    case ForeverFree = "forever_free";
}
