<?php

namespace Mailchimp\Types;

enum AutomationWorkflowStatus: string
{
    case Save = "save";
    case Paused = "paused";
    case Sending = "sending";
}
