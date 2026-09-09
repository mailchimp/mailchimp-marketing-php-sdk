<?php

namespace Mailchimp\Types;

enum AbTestingOptionsSplitTest: string
{
    case Subject = "subject";
    case FromName = "from_name";
    case Schedule = "schedule";
}
