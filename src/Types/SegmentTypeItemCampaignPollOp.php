<?php

namespace Mailchimp\Types;

enum SegmentTypeItemCampaignPollOp: string
{
    case Member = "member";
    case Notmember = "notmember";
}
