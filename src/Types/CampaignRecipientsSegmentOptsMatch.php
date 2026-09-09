<?php

namespace Mailchimp\Types;

enum CampaignRecipientsSegmentOptsMatch: string
{
    case Any = "any";
    case All = "all";
}
