<?php

namespace Mailchimp\Campaigns\Types;

enum ListCampaignsRequestType: string
{
    case Regular = "regular";
    case Plaintext = "plaintext";
    case Absplit = "absplit";
    case Rss = "rss";
    case Variate = "variate";
}
