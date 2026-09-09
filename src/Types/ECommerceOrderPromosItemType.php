<?php

namespace Mailchimp\Types;

enum ECommerceOrderPromosItemType: string
{
    case Fixed = "fixed";
    case Percentage = "percentage";
}
