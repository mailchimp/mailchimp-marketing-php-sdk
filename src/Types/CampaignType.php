<?php

namespace Mailchimp\Types;

enum CampaignType: string
{
    case Regular = "regular";
    case Plaintext = "plaintext";
    case Absplit = "absplit";
    case Rss = "rss";
    case Variate = "variate";
}
