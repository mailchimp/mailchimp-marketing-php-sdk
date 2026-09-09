<?php

namespace Mailchimp\Ecommerce\Types;

enum UpdateStoreOrderEcommerceRequestPromosItemType: string
{
    case Fixed = "fixed";
    case Percentage = "percentage";
}
