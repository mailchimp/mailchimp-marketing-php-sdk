<?php

namespace Mailchimp\Types;

enum CampaignsType: string
{
    case Regular = "regular";
    case Plaintext = "plaintext";
    case Absplit = "absplit";
    case Rss = "rss";
    case Variate = "variate";
}
