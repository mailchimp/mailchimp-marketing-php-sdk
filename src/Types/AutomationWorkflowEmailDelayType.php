<?php

namespace Mailchimp\Types;

enum AutomationWorkflowEmailDelayType: string
{
    case Now = "now";
    case Day = "day";
    case Hour = "hour";
    case Week = "week";
}
