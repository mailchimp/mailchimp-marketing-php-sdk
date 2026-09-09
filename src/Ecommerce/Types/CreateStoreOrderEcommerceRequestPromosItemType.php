<?php

namespace Mailchimp\Ecommerce\Types;

enum CreateStoreOrderEcommerceRequestPromosItemType: string
{
    case Fixed = "fixed";
    case Percentage = "percentage";
}
