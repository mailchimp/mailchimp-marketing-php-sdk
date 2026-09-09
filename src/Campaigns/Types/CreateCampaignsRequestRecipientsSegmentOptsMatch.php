<?php

namespace Mailchimp\Campaigns\Types;

enum CreateCampaignsRequestRecipientsSegmentOptsMatch: string
{
    case Any = "any";
    case All = "all";
}
