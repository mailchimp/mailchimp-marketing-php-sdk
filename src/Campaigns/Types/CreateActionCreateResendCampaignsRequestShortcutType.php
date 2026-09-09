<?php

namespace Mailchimp\Campaigns\Types;

enum CreateActionCreateResendCampaignsRequestShortcutType: string
{
    case ToNonOpeners = "to_non_openers";
    case ToNewSubscribers = "to_new_subscribers";
    case ToNonClickers = "to_non_clickers";
    case ToNonPurchasers = "to_non_purchasers";
}
