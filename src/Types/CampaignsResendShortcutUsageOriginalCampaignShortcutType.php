<?php

namespace Mailchimp\Types;

enum CampaignsResendShortcutUsageOriginalCampaignShortcutType: string
{
    case NonOpeners = "non_openers";
    case NewSubscribers = "new_subscribers";
    case NonClickers = "non_clickers";
    case NonPurchasers = "non_purchasers";
}
