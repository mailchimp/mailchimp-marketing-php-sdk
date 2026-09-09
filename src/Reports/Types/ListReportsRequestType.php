<?php

namespace Mailchimp\Reports\Types;

enum ListReportsRequestType: string
{
    case Regular = "regular";
    case Plaintext = "plaintext";
    case Absplit = "absplit";
    case Rss = "rss";
    case Variate = "variate";
}
