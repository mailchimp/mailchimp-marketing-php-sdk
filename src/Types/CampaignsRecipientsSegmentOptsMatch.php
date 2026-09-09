<?php

namespace Mailchimp\Types;

enum CampaignsRecipientsSegmentOptsMatch: string
{
    case Any = "any";
    case All = "all";
}
