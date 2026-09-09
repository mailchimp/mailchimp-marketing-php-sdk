<?php

namespace Mailchimp\Types;

enum AutomationWorkflowEmailDelayDirection: string
{
    case Before = "before";
    case After = "after";
}
