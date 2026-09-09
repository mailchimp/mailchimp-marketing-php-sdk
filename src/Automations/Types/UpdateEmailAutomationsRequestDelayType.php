<?php

namespace Mailchimp\Automations\Types;

enum UpdateEmailAutomationsRequestDelayType: string
{
    case Now = "now";
    case Day = "day";
    case Hour = "hour";
    case Week = "week";
}
