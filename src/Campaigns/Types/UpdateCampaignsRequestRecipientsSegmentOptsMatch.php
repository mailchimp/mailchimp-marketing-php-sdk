<?php

namespace Mailchimp\Campaigns\Types;

enum UpdateCampaignsRequestRecipientsSegmentOptsMatch: string
{
    case Any = "any";
    case All = "all";
}
