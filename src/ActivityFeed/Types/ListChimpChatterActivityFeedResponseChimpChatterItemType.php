<?php

namespace Mailchimp\ActivityFeed\Types;

enum ListChimpChatterActivityFeedResponseChimpChatterItemType: string
{
    case ListsNewSubscriber = "lists:new-subscriber";
    case ListsUnsubscribes = "lists:unsubscribes";
    case ListsProfileUpdates = "lists:profile-updates";
    case CampaignsFacebookLikes = "campaigns:facebook-likes";
    case CampaignsForwardToFriend = "campaigns:forward-to-friend";
    case ListsImports = "lists:imports";
}
