<?php

namespace Mailchimp\Types;

enum AutomationWorkflowEmailStatus: string
{
    case Save = "save";
    case Paused = "paused";
    case Sending = "sending";
}
