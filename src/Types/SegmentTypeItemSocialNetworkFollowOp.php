<?php

namespace Mailchimp\Types;

enum SegmentTypeItemSocialNetworkFollowOp: string
{
    case Follow = "follow";
    case Notfollow = "notfollow";
}
